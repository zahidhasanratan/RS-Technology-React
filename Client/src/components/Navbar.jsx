import { useState, useEffect, useRef } from "react";
import {
  FiMenu,
  FiX,
  FiChevronDown,
  FiChevronUp,
  FiChevronRight,
} from "react-icons/fi";
import { Link, useNavigate, useLocation } from "react-router-dom";
import { motion } from "framer-motion";
import logo from "../assets/rs-tech-asset/logo.png";

const WEBMAIL_URL = "https://162.241.117.134:2096";

const Navbar = () => {
  const [isOpen, setIsOpen] = useState(false);
  const [openDropdown, setOpenDropdown] = useState(null);        // level-1 id
  const [openSubDropdown, setOpenSubDropdown] = useState(null);  // `${parentId}-${index}`
  const [openThirdDropdown, setOpenThirdDropdown] = useState(null); // mobile only
  const [menus, setMenus] = useState([]);

  const navigate = useNavigate();
  const location = useLocation();
  const closeTimeout = useRef(null);

  // --- timer helpers ---
  const clearCloseTimer = () => {
    if (closeTimeout.current) {
      clearTimeout(closeTimeout.current);
      closeTimeout.current = null;
    }
  };
  const armCloseTimer = () => {
    clearCloseTimer();
    closeTimeout.current = setTimeout(() => {
      setOpenDropdown(null);
      setOpenSubDropdown(null);
      setOpenThirdDropdown(null);
    }, 220);
  };

  useEffect(() => {
    const fetchMenus = async () => {
      try {
        const res = await fetch("https://server.rst-bd.com/api/menus");
        const data = await res.json();
        const mapped = [
          { id: "home", path: "/", label: "Home", subItems: [] },
          ...data.map((item) => ({
            id: String(item.id),
            label: item.menu_name,
            path:
              item.page_type === "url"
                ? item.external_link
                : `/page/${item.slug}`,
            subItems: item.submenus?.map((subItem, si) => ({
              id: String(subItem.id),
              rowKey: `${item.id}-${si}`,
              label: subItem.menu_name,
              path:
                subItem.page_type === "url"
                  ? subItem.external_link
                  : `/page/${subItem.slug}`,
              subItems: subItem.submenus?.map((thirdItem) => ({
                id: String(thirdItem.id),
                label: thirdItem.menu_name,
                path:
                  thirdItem.page_type === "url"
                    ? thirdItem.external_link
                    : `/page/${thirdItem.slug}`,
              })),
            })),
          })),
        ];
        setMenus(mapped);
      } catch (e) {
        console.error("Error fetching menus:", e);
      }
    };
    fetchMenus();
  }, []);

  const handleLinkClick = (path) => {
    setOpenDropdown(null);
    setOpenSubDropdown(null);
    setOpenThirdDropdown(null);
    setIsOpen(false);
    if (location.pathname === path) {
      navigate("/empty");
      setTimeout(() => navigate(path), 10);
    } else {
      navigate(path);
    }
  };

  const toggleMenu = () => {
    setIsOpen((v) => !v);
    setOpenDropdown(null);
    setOpenSubDropdown(null);
    setOpenThirdDropdown(null);
  };

  // Mobile indentation (avoid dynamic tailwind like pl-${})
  const levelPaddingClass = (level) => {
    if (level === 0) return "pl-0";
    if (level === 1) return "pl-4";
    return "pl-8";
  };

  // Mobile renderer
  const renderMenuItems = (items, level = 0, parentKey = "") =>
    items.map((item) => {
      const key = `${parentKey}-${item.id}`;
      const isOpenLocal =
        level === 0
          ? openDropdown === key
          : level === 1
          ? openSubDropdown === key
          : openThirdDropdown === key;

      const setOpenFn =
        level === 0
          ? setOpenDropdown
          : level === 1
          ? setOpenSubDropdown
          : setOpenThirdDropdown;

      return (
        <li key={key} className={`text-white ${levelPaddingClass(level)}`}>
          <div
            className="flex justify-between items-center py-2 cursor-pointer hover:text-orange-300"
            onClick={() =>
              item.subItems?.length
                ? setOpenFn(isOpenLocal ? null : key)
                : handleLinkClick(item.path)
            }
          >
            <span>{item.label}</span>
            {item.subItems?.length > 0 &&
              (isOpenLocal ? <FiChevronUp /> : <FiChevronDown />)}
          </div>
          {isOpenLocal && item.subItems?.length > 0 && (
            <ul className="pl-2">
              {renderMenuItems(item.subItems, level + 1, key)}
            </ul>
          )}
        </li>
      );
    });

  return (
    <header className="bg-white rounded-4xl font-medium text-black w-full md:max-w-[95%] mt-2 lg:mt-10 z-50 lg:absolute lg:left-1/2 lg:transform lg:-translate-x-1/2">
      <div className="w-full px-4 sm:px-6 lg:px-8">
        <div className="max-w-[1280px] mx-auto flex items-center justify-between py-2">
          {/* Logo */}
          <Link to="/" onClick={() => handleLinkClick("/")} className="flex-shrink-0">
            <img
              src={logo}
              alt="Logo"
              className="h-10 sm:h-12 md:h-14 w-auto object-contain max-w-[160px]"
            />
          </Link>

          {/* Desktop Navigation */}
          <nav className="hidden lg:flex gap-8 items-center">
            {menus.map((item) => (
              <div
                key={item.id}
                className="relative"
                onMouseEnter={() => {
                  clearCloseTimer();
                  setOpenDropdown(item.id);
                }}
                onMouseLeave={armCloseTimer}
              >
                <div
                  className="text-[16px] text-[#393939] hover:text-indigo-900 cursor-pointer flex items-center gap-1 select-none"
                  onClick={() => handleLinkClick(item.path)}
                >
                  {item.label}
                  {item.subItems?.length > 0 &&
                    (openDropdown === item.id ? <FiChevronUp /> : <FiChevronDown />)}
                </div>

                {/* Level-1 dropdown */}
                {openDropdown === item.id && item.subItems?.length > 0 && (
                  <div
                    className="absolute top-full left-0 bg-indigo-950 shadow-lg rounded-md mt-2 min-w-[260px] py-2 z-20"
                    // Keep the dropdown "hot" while pointer is anywhere inside
                    onMouseEnter={clearCloseTimer}
                    onMouseLeave={armCloseTimer}
                  >
                    {item.subItems.map((subItem) => (
                      <div
                        key={subItem.id}
                        className="relative px-4"
                        // Hovering a row selects it; DO NOT arm timer here
                        onMouseEnter={() => {
                          clearCloseTimer();
                          setOpenSubDropdown(subItem.rowKey);
                        }}
                      >
                        <div
                          className="flex justify-between items-center w-full py-2 text-sm text-white hover:text-orange-300 cursor-pointer"
                          onClick={() => handleLinkClick(subItem.path)}
                        >
                          {subItem.label}
                          {subItem.subItems?.length > 0 && <FiChevronRight />}
                        </div>

                        {/* Level-2 -> Level-3 */}
                        {openSubDropdown === subItem.rowKey &&
                          subItem.subItems?.length > 0 && (
                            <div
                              className="absolute left-full top-0 bg-indigo-950 shadow-lg rounded-md min-w-[220px] z-30"
                              // overlap to eliminate any dead gap
                              style={{ marginLeft: -2 }}
                              // keep alive while in level-3
                              onMouseEnter={() => {
                                clearCloseTimer();
                                setOpenSubDropdown(subItem.rowKey);
                              }}
                            >
                              {subItem.subItems.map((thirdItem) => (
                                <div
                                  key={thirdItem.id}
                                  className="px-4 py-2 text-white text-sm hover:text-orange-300 cursor-pointer whitespace-nowrap"
                                  onClick={() => handleLinkClick(thirdItem.path)}
                                >
                                  {thirdItem.label}
                                </div>
                              ))}
                            </div>
                          )}
                      </div>
                    ))}
                  </div>
                )}
              </div>
            ))}

            {/* Desktop Webmail link */}
            <motion.a
              whileTap={{ scale: 0.95 }}
              href={WEBMAIL_URL}
              target="_blank"
              rel="noopener noreferrer"
              className="text-[16px] text-[#393939] hover:text-indigo-900 cursor-pointer select-none"
            >
              Webmail
            </motion.a>
          </nav>

          {/* Mobile Toggle */}
          <motion.button
            whileHover={{ scale: 1.05 }}
            whileTap={{ scale: 0.95 }}
            onClick={toggleMenu}
            className="lg:hidden text-white p-2 rounded-lg bg-indigo-950"
            aria-label="Toggle menu"
          >
            {isOpen ? <FiX size={24} /> : <FiMenu size={24} />}
          </motion.button>
        </div>
      </div>

      {/* Mobile Dropdown */}
      {isOpen && (
        <motion.div
          initial={{ opacity: 0 }}
          animate={{ opacity: 1 }}
          className="lg:hidden bg-indigo-950 text-sm shadow-md px-4 pb-4"
        >
          <ul>
            {renderMenuItems(menus)}
            <li key="mobile-webmail" className="text-white">
              <a
                href={WEBMAIL_URL}
                target="_blank"
                rel="noopener noreferrer"
                className="block py-2 hover:text-orange-300"
              >
                Webmail
              </a>
            </li>
          </ul>
        </motion.div>
      )}
    </header>
  );
};

export default Navbar;
