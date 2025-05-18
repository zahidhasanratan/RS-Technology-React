import { useState, useRef, useEffect } from "react";
import { FiMenu, FiX, FiChevronDown, FiChevronUp } from "react-icons/fi";
import { Link, useNavigate, useLocation } from "react-router-dom";
import { motion } from "framer-motion";
import logo from "../assets/rs-tech-asset/logo.png";

const Navbar = () => {
    const [isOpen, setIsOpen] = useState(false);
    const [openDropdown, setOpenDropdown] = useState(null);
    const [openSubDropdown, setOpenSubDropdown] = useState(null);
    const [hoverTimeout, setHoverTimeout] = useState(null);
    const navRef = useRef(null);
    const navigate = useNavigate();
    const location = useLocation();

    useEffect(() => {
        return () => {
            if (hoverTimeout) clearTimeout(hoverTimeout);
        };
    }, [hoverTimeout]);

    const toggleMenu = () => {
        setIsOpen(!isOpen);

        // Reset dropdown and sub-dropdown states when the menu is toggled (closed)
        if (isOpen) {
            setOpenDropdown(null);
            setOpenSubDropdown(null);
        }
    };

    const handleLinkClick = (path) => {
        setOpenDropdown(null);
        setOpenSubDropdown(null);
        setIsOpen(false);

        if (location.pathname === path) {
            navigate('/empty');
            setTimeout(() => navigate(path), 10);
        } else {
            navigate(path);
        }
    };

    const handleDropdownHover = (id) => {
        clearTimeout(hoverTimeout);
        setHoverTimeout(setTimeout(() => {
            setOpenDropdown(id);
        }, 200));
    };

    const handleDropdownLeave = () => {
        clearTimeout(hoverTimeout);
        setHoverTimeout(setTimeout(() => {
            setOpenDropdown(null);
            setOpenSubDropdown(null);
        }, 700));
    };

    const handleSubDropdownHover = (subIndex) => {
        clearTimeout(hoverTimeout);
        setHoverTimeout(setTimeout(() => {
            setOpenSubDropdown(subIndex);
        }, 100));
    };

    const navItems = [
        { id: "home", path: "/", label: "Home" },
        {
            id: "about",
            label: "About Us",
            subItems: [
                { id: "about-page", path: "/about", label: "About" },
                { id: "management", path: "/management", label: "Management Info" }
            ]
        },
        {
            id: "project",
            label: "Projects",
            subItems: [
                { id: "completedproject", path: "/products", label: "Completed Projects" },
                { id: "upcomingproject", path: "/products", label: "Upcoming Projects" },
                { id: "runningproject", path: "/products", label: "Running Projects " },
            ]
        },
        { id: "products", path: "/products", label: "Products" },
        {
            id: "solutions",
            label: "Solutions",
            path: "/solution",
            subItems: [
                {
                    id: "network-solution",
                    label: "Enterprise Network Solution",
                    subItems: [
                        { id: "structured-lan", path: "/singlesolution", label: "Structured LAN" },
                        { id: "enterprise-wifi", path: "/singlesolution", label: "Enterprise Wi-Fi" },
                        { id: "cloud-networks", path: "/singlesolution", label: "Cloud Networks" }
                    ]
                },
                {
                    id: "cctv",
                    label: "CCTV Surveillance",
                    subItems: [
                        { id: "ir-cam", path: "/singlesolution", label: "IR CAM" },
                        { id: "box-camera", path: "/singlesolution", label: "Box Type Camera" },
                        { id: "dome-camera", path: "/singlesolution", label: "Dome Camera" }
                    ]
                },
                { id: "centralized", path: "/solution", label: "Centralized Surveillance" },
                { id: "video-conf", path: "/solution", label: "Video Conference" },
                { id: "pa-system", path: "/solution", label: "PA System" },
                { id: "ip-pabx", path: "/solution", label: "IP PABX" },
                { id: "fire-detection", path: "/solution", label: "Fire Detection" }
            ]
        },
        { id: "clients", path: "/clients", label: "Our Clients" },
        {
            id: "gallery",
            label: "Gallery",
            subItems: [
                { id: "photo", path: "/photo", label: "Photo Gallery" },
                { id: "video", path: "/video", label: "Video Gallery" }
            ]
        },
        { id: "news", path: "/news", label: "News" },
        { id: "contact", path: "/contact", label: "Contact" }
    ];

    return (
        <header className="bg-white rounded-4xl font-medium text-black w-full md:max-w-[85%] mt-2 lg:mt-10 mx-auto lg:mx-24 z-50 lg:absolute left-0 right-0 lg:left-auto lg:right-auto">
            <div className="container mx-auto p-2  lg:p-4 flex justify-between lg:justify-even lg:gap-10 items-center">
                <Link to="/" className="block" onClick={() => handleLinkClick('/')}> <img src={logo} alt="Logo" className="h-10 sm:w-[120px] lg:w-[200px] lg:h-16" /> </Link>
                <nav className="hidden lg:flex gap-8 py-4 px-8 items-center">
                    {navItems.map((item, index) => (
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
                                    {item.subItems && (openDropdown === item.id ? <FiChevronUp /> : <FiChevronDown />)}
                                </div>
                            </motion.div>
                            {openDropdown === item.id && item.subItems && (
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
                                            onMouseEnter={() => handleSubDropdownHover(`${item.id}-${subIndex}`)}
                                            onMouseLeave={handleDropdownLeave}
                                        >
                                            {subItem.path ? (
                                                <motion.div whileTap={{ scale: 0.95 }}>
                                                    <Link
                                                        to={subItem.path}
                                                        className="block py-2 text-sm text-white hover:text-orange-300"
                                                        onClick={(e) => {
                                                            e.preventDefault();
                                                            handleLinkClick(subItem.path);
                                                        }}
                                                    >
                                                        {subItem.label}
                                                    </Link>
                                                </motion.div>
                                            ) : (
                                                <>
                                                    <motion.div
                                                        whileTap={{ scale: 0.95 }}
                                                        className="flex justify-between items-center w-full py-2 text-sm text-white hover:text-orange-300 cursor-pointer"
                                                    >
                                                        <span>{subItem.label}</span>
                                                        <FiChevronDown className="ml-2" />
                                                    </motion.div>
                                                    {openSubDropdown === `${item.id}-${subIndex}` && subItem.subItems && (
                                                        <motion.div
                                                            initial={{ opacity: 0 }}
                                                            animate={{ opacity: 1 }}
                                                            transition={{ duration: 0.15 }}
                                                            className="absolute left-full top-0 ml-1 bg-indigo-950 shadow-lg rounded-md min-w-[200px] z-10"
                                                        >
                                                            {subItem.subItems.map((nestedItem) => (
                                                                <motion.div key={nestedItem.id} whileTap={{ scale: 0.95 }}>
                                                                    <Link
                                                                        to={nestedItem.path}
                                                                        className="block px-4 py-2 text-white text-sm hover:text-orange-300"
                                                                        onClick={(e) => {
                                                                            e.preventDefault();
                                                                            handleLinkClick(nestedItem.path);
                                                                        }}
                                                                    >
                                                                        {nestedItem.label}
                                                                    </Link>
                                                                </motion.div>
                                                            ))}
                                                        </motion.div>
                                                    )}
                                                </>
                                            )}
                                        </div>
                                    ))}
                                </motion.div>
                            )}
                        </div>
                    ))}
                </nav>
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
                    initial={{ opacity: 0, y: 0 }}
                    animate={{ opacity: 1, y: 0 }}
                    className="lg:hidden bg-indigo-950 text-sm shadow-md px-4 pb-4"
                >
                    <ul className="space-y-1">
                        {navItems.map((item) => (
                            <motion.li
                                key={`mobile-${item.id}`}
                                initial={{ opacity: 0, x: -10 }}
                                animate={{ opacity: 1, x: 0 }}
                                className="w-full"
                            >
                                {item.path ? (
                                    <motion.div whileTap={{ scale: 0.95 }}>
                                        <Link
                                            to={item.path}
                                            className="block py-2 text-white text-xs hover:text-indigo-300"
                                            onClick={(e) => {
                                                e.preventDefault();
                                                handleLinkClick(item.path);
                                            }}
                                        >
                                            {item.label}
                                        </Link>
                                    </motion.div>
                                ) : (
                                    <>
                                        <motion.button
                                            whileTap={{ scale: 0.95 }}
                                            onClick={() => setOpenDropdown(openDropdown === item.id ? null : item.id)}
                                            className="flex w-full py-2 text-white text-xs hover:text-indigo-300 items-center justify-between"
                                        >
                                            <span>{item.label}</span>
                                            {openDropdown === item.id ? (
                                                <FiChevronUp className="ml-2" />
                                            ) : (
                                                <FiChevronDown className="ml-2" />
                                            )}
                                        </motion.button>

                                        {openDropdown === item.id && item.subItems && (
                                            <ul className="py-2 space-y-2 pl-4">
                                                {item.subItems.map((subItem) => (
                                                    <motion.li
                                                        key={`mobile-${subItem.id}`}
                                                        initial={{ opacity: 0, x: -10 }}
                                                        animate={{ opacity: 1, x: 0 }}
                                                    >
                                                        {subItem.path ? (
                                                            <motion.div whileTap={{ scale: 0.95 }}>
                                                                <Link
                                                                    to={subItem.path}
                                                                    className="block py-2 text-white text-xs hover:text-indigo-300"
                                                                    onClick={(e) => {
                                                                        e.preventDefault();
                                                                        handleLinkClick(subItem.path);
                                                                    }}
                                                                >
                                                                    {subItem.label}
                                                                </Link>
                                                            </motion.div>
                                                        ) : (
                                                            <>
                                                                <motion.button
                                                                    whileTap={{ scale: 0.95 }}
                                                                    onClick={() => setOpenSubDropdown(openSubDropdown === subItem.id ? null : subItem.id)}
                                                                    className="flex w-full py-2 text-white text-xs hover:text-indigo-300 items-center justify-between"
                                                                >
                                                                    <span>{subItem.label}</span>
                                                                    <FiChevronDown className="ml-2" />
                                                                </motion.button>

                                                                {openSubDropdown === subItem.id && subItem.subItems && (
                                                                    <ul className="pl-4 space-y-2 mt-2">
                                                                        {subItem.subItems.map((nestedItem) => (
                                                                            <motion.li
                                                                                key={`mobile-${nestedItem.id}`}
                                                                                initial={{ opacity: 0, x: -10 }}
                                                                                animate={{ opacity: 1, x: 0 }}
                                                                            >
                                                                                <motion.div whileTap={{ scale: 0.95 }}>
                                                                                    <Link
                                                                                        to={nestedItem.path}
                                                                                        className="block py-2 text-white text-xs hover:text-indigo-300"
                                                                                        onClick={(e) => {
                                                                                            e.preventDefault();
                                                                                            handleLinkClick(nestedItem.path);
                                                                                        }}
                                                                                    >
                                                                                        {nestedItem.label}
                                                                                    </Link>
                                                                                </motion.div>
                                                                            </motion.li>
                                                                        ))}
                                                                    </ul>
                                                                )}
                                                            </>
                                                        )}
                                                    </motion.li>
                                                ))}
                                            </ul>
                                        )}
                                    </>
                                )}
                            </motion.li>
                        ))}
                    </ul>
                </motion.div>
            )}
        </header>
    );
};

export default Navbar;
