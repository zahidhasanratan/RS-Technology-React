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
  const [openDropdown, setOpenDropdown] = useState(null);
  const [openSubDropdown, setOpenSubDropdown] = useState(null);
  const [openThirdDropdown, setOpenThirdDropdown] = useState(null);
  const [menus, setMenus] = useState([]);

  const navigate = useNavigate();
  const location = useLocation();
  const closeTimeout = useRef(null);

  useEffect(() => {
    const fetchMenus = async () => {
      try {
        const response = await fetch("https://server.rst-bd.com/api/menus");
        const data = await response.json();
        const mappedMenus = [
          { id: "home", path: "/", label: "Home", subItems: [] },
          ...data.map((item) => ({
            id: item.id,
            label: item.menu_name,
            path:
              item.page_type === "url"
                ? item.external_link
                : `/page/${item.slug}`,
            subItems: item.submenus?.map((subItem) => ({
              id: subItem.id,
              label: subItem.menu_name,
              path:
                subItem.page_type === "url"
                  ? subItem.external_link
                  : `/page/${subItem.slug}`,
              subItems: subItem.submenus?.map((thirdItem) => ({
                id: thirdItem.id,
                label: thirdItem.menu_name,
                path:
                  thirdItem.page_type === "url"
                    ? thirdItem.external_link
                    : `/page/${thirdItem.slug}`,
              })),
            })),
          })),
        ];
        setMenus(mappedMenus);
      } catch (error) {
        console.error("Error fetching menus:", error);
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
    setIsOpen(!isOpen);
    setOpenDropdown(null);
    setOpenSubDropdown(null);
    setOpenThirdDropdown(null);
  };

  const handleMouseEnter = (setOpenFn, id) => {
    if (closeTimeout.current) {
      clearTimeout(closeTimeout.current);
      closeTimeout.current = null;
    }
    setOpenFn(id);
  };

  const handleMouseLeave = () => {
    closeTimeout.current = setTimeout(() => {
      setOpenDropdown(null);
      setOpenSubDropdown(null);
      setOpenThirdDropdown(null);
    }, 250);
  };

  const renderMenuItems = (items, level = 0, parentKey = "") =>
    items.map((item, index) => {
      const key = `${parentKey}-${item.id}`;
      const isOpen =
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
        <li key={key} className={`text-white pl-${level * 4}`}>
          <div
            className="flex justify-between items-center py-2 cursor-pointer hover:text-orange-300"
            onClick={() =>
              item.subItems?.length
                ? setOpenFn(isOpen ? null : key)
                : handleLinkClick(item.path)
            }
          >
            <span>{item.label}</span>
            {item.subItems?.length > 0 &&
              (isOpen ? <FiChevronUp /> : <FiChevronDown />)}
          </div>
          {isOpen && item.subItems?.length > 0 && (
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
          {/* Logo on the left */}
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
                onMouseEnter={() => handleMouseEnter(setOpenDropdown, item.id)}
                onMouseLeave={handleMouseLeave}
              >
                <div
                  className="text-[16px] text-[#393939] hover:text-indigo-900 cursor-pointer flex items-center gap-1 select-none"
                  onClick={() => handleLinkClick(item.path)}
                >
                  {item.label}
                  {item.subItems?.length > 0 &&
                    (openDropdown === item.id ? (
                      <FiChevronUp />
                    ) : (
                      <FiChevronDown />
                    ))}
                </div>

                {/* Dropdown Menu */}
                {openDropdown === item.id && item.subItems?.length > 0 && (
                  <div className="absolute top-full left-0 bg-indigo-950 shadow-lg rounded-md mt-2 min-w-[250px] py-2 z-10">
                    {item.subItems.map((subItem, i) => (
                      <div
                        key={subItem.id}
                        className="relative px-4"
                        onMouseEnter={() =>
                          handleMouseEnter(setOpenSubDropdown, `${item.id}-${i}`)
                        }
                        onMouseLeave={handleMouseLeave}
                      >
                        <div
                          className="flex justify-between items-center w-full py-2 text-sm text-white hover:text-orange-300 cursor-pointer"
                          onClick={() => handleLinkClick(subItem.path)}
                        >
                          {subItem.label}
                          {subItem.subItems?.length > 0 && <FiChevronRight />}
                        </div>
                        {openSubDropdown === `${item.id}-${i}` &&
                          subItem.subItems?.length > 0 && (
                            <div className="absolute left-full top-0 ml-1 bg-indigo-950 shadow-lg rounded-md min-w-[200px] z-20">
                              {subItem.subItems.map((thirdItem) => (
                                <div
                                  key={thirdItem.id}
                                  className="px-4 py-2 text-white text-sm hover:text-orange-300 cursor-pointer"
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

            {/* Desktop Webmail link (parent-level, no submenu) */}
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

          {/* Mobile Toggle Button */}
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

            {/* Mobile Webmail link (parent-level, no submenu) */}
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
