import { motion } from 'framer-motion';
import serviceImage1 from "../assets/rs-tech-asset/service-image-1.jpg";
import serviceImage2 from "../assets/rs-tech-asset/service-image-2.jpg";
import serviceImage3 from "../assets/rs-tech-asset/service-image-3.jpg";
import serviceImage4 from "../assets/rs-tech-asset/service-image-4.jpg";
import serviceImage5 from "../assets/rs-tech-asset/service-image-5.jpg";
import serviceImage6 from "../assets/rs-tech-asset/service-image-6.jpg";
import imgw from "../assets/rs-tech-asset/icon-sub-heading.svg";
import { useLocation } from 'react-router-dom';
const ServiceHome = ({ title = "", subtitle = "" }) => {

    const fadeInUp = {
        hidden: { opacity: 0, y: 20 },
        visible: {
            opacity: 1,
            y: 0,
            transition: { duration: 0.6, ease: "easeOut" }
        }
    };
    const location = useLocation();
    const isHome = location.pathname === "/";
    const services = [
        {
            id: 1,
            title: "Enterprise Network Solution",
            description: "Comprehensive networking solutions for businesses of all sizes.",
            image: serviceImage1,
            delay: 0
        },
        {
            id: 2,
            title: "Enterprise CCTV Surveillance Solution",
            description: "Advanced surveillance systems for complete security coverage.",
            image: serviceImage2,
            delay: 0.2
        },
        {
            id: 3,
            title: "Centralized Video Surveillance Solutions",
            description: "Integrated video monitoring with centralized management.",
            image: serviceImage3,
            delay: 0.4
        },
        {
            id: 4,
            title: "Digital Video Conference System",
            description: "High-quality video conferencing for seamless communication.",
            image: serviceImage4,
            delay: 0.6
        },
        {
            id: 5,
            title: "Public Address (PA) System",
            description: "Reliable audio systems for clear public announcements.",
            image: serviceImage5,
            delay: 0.8
        },
        {
            id: 6,
            title: "IP PABX System",
            description: "Modern telephony solutions for efficient business communication.",
            image: serviceImage6,
            delay: 1
        }
    ];

    return (
        <section className="py-2 md:px-24 lg:px-24 bg-white">
            <div className="container mx-auto px-4">
                {/* Section Header */}
                <div className="text-center mb-16">
                    <motion.div
                        initial="hidden"
                        whileInView="visible"
                        viewport={{ once: true }}
                        variants={fadeInUp}
                        transition={{ duration: 0.6 }}
                        className="flex items-center justify-center gap-2 mb-2"
                    >
                        {isHome && (
                            <img src={imgw} alt="icon" className="w-5 h-5" />
                        )}
                        <h3 className="text-lg font-medium text-indigo-950 dark:text-indigo-400">
                            {title}
                        </h3>
                    </motion.div>

                    <motion.h2
                        initial="hidden"
                        whileInView="visible"
                        viewport={{ once: true }}
                        variants={fadeInUp}
                        transition={{ duration: 0.6, delay: 0.2 }}
                        className="text-3xl md:text-4xl font-bold text-gray-900 dark:text-white"
                    >
                        {subtitle}
                    </motion.h2>
                </div>

                {/* Services Grid */}
                <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    {services.map((service) => (
                        <motion.div
                            key={service.id}
                            initial="hidden"
                            whileInView="visible"
                            viewport={{ once: true }}
                            variants={fadeInUp}
                            transition={{ duration: 0.6, delay: service.delay }}
                            className="bg-white dark:bg-gray-700 rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300"
                        >
                            {/* Image with the same hover effect as NewsSingle */}
                            <div className="relative group w-full h-48 overflow-hidden">
                                <img
                                    src={service.image}
                                    alt={service.title}
                                    className="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105"
                                />
                                <div className="absolute inset-0 pointer-events-none before:content-[''] before:absolute before:inset-0 before:bg-black before:rounded-full before:opacity-0 before:transition-all before:duration-700 group-hover:before:opacity-50 group-hover:before:scale-200 before:scale-0 before:origin-center mix-blend-overlay"></div>
                            </div>

                            {/* Content */}
                            <div className="p-6">
                                <h3 className="text-xl font-semibold mb-3 text-gray-800 dark:text-white">
                                    {service.title}
                                </h3>
                                <p className="text-gray-600 dark:text-gray-300 mb-5">
                                    {service.description}
                                </p>
                                <motion.div whileHover={{ x: 5 }}>
                                    <a
                                        href="#"
                                        className="inline-flex items-center text-indigo-600 dark:text-indigo-400 font-medium hover:text-indigo-800 dark:hover:text-indigo-300 transition-colors"
                                    >
                                        Discover More
                                        <svg
                                            className="w-4 h-4 ml-2"
                                            fill="none"
                                            stroke="currentColor"
                                            viewBox="0 0 24 24"
                                            xmlns="http://www.w3.org/2000/svg"
                                        >
                                            <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                        </svg>
                                    </a>
                                </motion.div>
                            </div>
                        </motion.div>
                    ))}
                </div>
            </div>
        </section>
    );
};

export default ServiceHome;