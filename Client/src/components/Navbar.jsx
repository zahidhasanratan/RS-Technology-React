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

const Navbar = () => {
  const [isOpen, setIsOpen] = useState(false);
  const [openDropdown, setOpenDropdown] = useState(null);
  const [openSubDropdown, setOpenSubDropdown] = useState(null);
  const [openThirdDropdown, setOpenThirdDropdown] = useState(null);
  const [menus, setMenus] = useState([]);

  const navigate = useNavigate();
  const location = useLocation();

  // Ref for close timer to manage delay on mouse leave
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

  // Functions to handle delayed closing on hover leave and cancel closing on hover enter
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
    }, 250); // Delay in ms
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
            <ul className="pl-2">{renderMenuItems(item.subItems, level + 1, key)}</ul>
          )}
        </li>
      );
    });

  return (
    <header className="bg-white rounded-4xl font-medium text-black w-full md:max-w-[95%] mt-2 lg:mt-10 z-50 lg:absolute left-1/2 top-0 transform -translate-x-1/2">
      <div className="container mx-auto p-2 lg:p-4 flex justify-between lg:justify-even lg:gap-10 items-center">
        <Link to="/" onClick={() => handleLinkClick("/")}>
          <img
            src={logo}
            alt="Logo"
            className="h-10 sm:w-[120px] lg:w-[200px] lg:h-16"
          />
        </Link>

        {/* Desktop Navigation */}
        <nav className="hidden lg:flex gap-8 py- px-8 items-center">
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
                  (openDropdown === item.id ? <FiChevronUp /> : <FiChevronDown />)}
              </div>

              {/* Desktop Dropdowns */}
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

      {/* Mobile Dropdown - Reusing same logic */}
      {isOpen && (
        <motion.div
          initial={{ opacity: 0 }}
          animate={{ opacity: 1 }}
          className="lg:hidden bg-indigo-950 text-sm shadow-md px-4 pb-4"
        >
          <ul>{renderMenuItems(menus)}</ul>
        </motion.div>
      )}
    </header>
  );
};

export default Navbar;
