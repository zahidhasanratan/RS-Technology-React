import { useState, useEffect } from "react";
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
  const [hoverTimeout, setHoverTimeout] = useState(null);
  const [menus, setMenus] = useState([]);
  const navigate = useNavigate();
  const location = useLocation();

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

  useEffect(() => {
    return () => hoverTimeout && clearTimeout(hoverTimeout);
  }, [hoverTimeout]);

  const toggleMenu = () => {
    setIsOpen(!isOpen);
    setOpenDropdown(null);
    setOpenSubDropdown(null);
    setOpenThirdDropdown(null);
  };

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

  const handleDropdownHover = (id) => {
    clearTimeout(hoverTimeout);
    setHoverTimeout(setTimeout(() => setOpenDropdown(id), 200));
  };

  const handleDropdownLeave = () => {
    clearTimeout(hoverTimeout);
    setHoverTimeout(
      setTimeout(() => {
        setOpenDropdown(null);
        setOpenSubDropdown(null);
        setOpenThirdDropdown(null);
      }, 700)
    );
  };

  const handleSubDropdownHover = (subIndex) => {
    clearTimeout(hoverTimeout);
    setHoverTimeout(setTimeout(() => setOpenSubDropdown(subIndex), 100));
  };

  const handleThirdDropdownHover = (thirdIndex) => {
    clearTimeout(hoverTimeout);
    setHoverTimeout(setTimeout(() => setOpenThirdDropdown(thirdIndex), 100));
  };

  return (
    <header className="bg-white rounded-4xl font-medium text-black w-full md:max-w-[85%] mt-2 lg:mt-10 mx-auto lg:mx-24 z-50 lg:absolute left-0 right-0 lg:left-auto lg:right-auto">
      <div className="container mx-auto p-2 lg:p-4 flex justify-between lg:justify-even lg:gap-10 items-center">
        <Link to="/" onClick={() => handleLinkClick("/")}>
          <img
            src={logo}
            alt="Logo"
            className="h-10 sm:w-[120px] lg:w-[200px] lg:h-16"
          />
        </Link>

        {/* Desktop Navigation */}
        <nav className="hidden lg:flex gap-8 py-4 px-8 items-center">
          {menus.map((item) => (
            <div
              key={item.id}
              className="relative"
              onMouseEnter={() => handleDropdownHover(item.id)}
              onMouseLeave={handleDropdownLeave}
            >
              <motion.div whileTap={{ scale: 0.95 }}>
                <div
                  className="hover:text-indigo-900 cursor-pointer flex items-center gap-1"
                  onClick={() => item.path && handleLinkClick(item.path)}
                >
                  {item.label}
                  {item.subItems?.length > 0 &&
                    (openDropdown === item.id ? (
                      <FiChevronUp />
                    ) : (
                      <FiChevronDown />
                    ))}
                </div>
              </motion.div>

              {openDropdown === item.id && item.subItems?.length > 0 && (
                <motion.div
                  initial={{ opacity: 0 }}
                  animate={{ opacity: 1 }}
                  transition={{ duration: 0.15 }}
                  className="absolute top-full left-0 bg-indigo-950 shadow-lg rounded-md mt-2 min-w-[250px] py-2 z-10"
                >
                  {item.subItems.map((subItem, subIndex) => (
                    <div
                      key={subItem.id}
                      className="relative px-4"
                      onMouseEnter={() =>
                        handleSubDropdownHover(`${item.id}-${subIndex}`)
                      }
                      onMouseLeave={handleDropdownLeave}
                    >
                      <div
                        className="flex justify-between items-center w-full py-2 text-sm text-white hover:text-orange-300 cursor-pointer"
                        onClick={() =>
                          subItem.path && handleLinkClick(subItem.path)
                        }
                      >
                        <span>{subItem.label}</span>
                        {subItem.subItems?.length > 0 && <FiChevronRight />}
                      </div>

                      {/* Third level dropdown */}
                      {openSubDropdown === `${item.id}-${subIndex}` &&
                        subItem.subItems?.length > 0 && (
                          <motion.div
                            initial={{ opacity: 0 }}
                            animate={{ opacity: 1 }}
                            transition={{ duration: 0.15 }}
                            className="absolute left-full top-0 ml-1 bg-indigo-950 shadow-lg rounded-md min-w-[200px] z-20"
                          >
                            {subItem.subItems.map((thirdItem) => (
                              <Link
                                key={thirdItem.id}
                                to={thirdItem.path}
                                className="block px-4 py-2 text-white text-sm hover:text-orange-300"
                                onClick={(e) => {
                                  e.preventDefault();
                                  handleLinkClick(thirdItem.path);
                                }}
                              >
                                {thirdItem.label}
                              </Link>
                            ))}
                          </motion.div>
                        )}
                    </div>
                  ))}
                </motion.div>
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

      {/* Mobile Menu */}
      {isOpen && (
        <motion.div
          initial={{ opacity: 0 }}
          animate={{ opacity: 1 }}
          className="lg:hidden bg-indigo-950 text-sm shadow-md px-4 pb-4"
        >
          <ul className="space-y-1">
            {menus.map((item) => (
              <li key={`mobile-${item.id}`}>
                <div
                  className="flex justify-between items-center text-white py-2 cursor-pointer"
                  onClick={() =>
                    setOpenDropdown(openDropdown === item.id ? null : item.id)
                  }
                >
                  {item.label}
                  {item.subItems?.length > 0 &&
                    (openDropdown === item.id ? (
                      <FiChevronUp />
                    ) : (
                      <FiChevronDown />
                    ))}
                </div>
                {openDropdown === item.id && item.subItems?.length > 0 && (
                  <ul className="pl-4 space-y-1">
                    {item.subItems.map((subItem) => (
                      <li key={`mobile-${subItem.id}`}>
                        <div
                          className="flex justify-between items-center text-white py-1 cursor-pointer"
                          onClick={() =>
                            setOpenSubDropdown(
                              openSubDropdown === subItem.id
                                ? null
                                : subItem.id
                            )
                          }
                        >
                          {subItem.label}
                          {subItem.subItems?.length > 0 && <FiChevronDown />}
                        </div>
                        {openSubDropdown === subItem.id &&
                          subItem.subItems?.length > 0 && (
                            <ul className="pl-4 space-y-1">
                              {subItem.subItems.map((thirdItem) => (
                                <li key={`mobile-${thirdItem.id}`}>
                                  <Link
                                    to={thirdItem.path}
                                    className="block text-white py-1 hover:text-indigo-300"
                                    onClick={(e) => {
                                      e.preventDefault();
                                      handleLinkClick(thirdItem.path);
                                    }}
                                  >
                                    {thirdItem.label}
                                  </Link>
                                </li>
                              ))}
                            </ul>
                          )}
                      </li>
                    ))}
                  </ul>
                )}
              </li>
            ))}
          </ul>
        </motion.div>
      )}
    </header>
  );
};

export default Navbar;
