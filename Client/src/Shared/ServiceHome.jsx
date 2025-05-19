import { useEffect, useState } from 'react';
import { motion } from 'framer-motion';
import { useLocation } from 'react-router-dom';
import imgw from "../assets/rs-tech-asset/icon-sub-heading.svg";
import axios from 'axios';

const ServiceHome = ({ title = "", subtitle = "" }) => {
    const [services, setServices] = useState([]);
    const location = useLocation();
    const isHome = location.pathname === "/";

    const fadeInUp = {
        hidden: { opacity: 0, y: 20 },
        visible: {
            opacity: 1,
            y: 0,
            transition: { duration: 0.6, ease: "easeOut" }
        }
    };

    useEffect(() => {
        axios.get('http://127.0.0.1:8000/api/solution')
            .then(response => {
                if (Array.isArray(response.data)) {
                    setServices(response.data);
                }
            })
            .catch(error => {
                console.error("Error fetching services:", error);
            });
    }, []);

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
                        {isHome && <img src={imgw} alt="icon" className="w-5 h-5" />}
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
                    {services.map((service, index) => (
                        <motion.div
                            key={service.id}
                            initial="hidden"
                            whileInView="visible"
                            viewport={{ once: true }}
                            variants={fadeInUp}
                            transition={{ duration: 0.6, delay: index * 0.2 }}
                            className="bg-white dark:bg-gray-700 rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300"
                        >
                            <a href={`/${service.slug}`} className="block relative group w-full h-48 overflow-hidden">
                                <img
                                    src={service.image}
                                    alt={service.title}
                                    className="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105"
                                />
                                <div className="absolute inset-0 pointer-events-none before:content-[''] before:absolute before:inset-0 before:bg-black before:rounded-full before:opacity-0 before:transition-all before:duration-700 group-hover:before:opacity-50 group-hover:before:scale-200 before:scale-0 before:origin-center mix-blend-overlay"></div>
                            </a>

                            <div className="p-6">
                                <h3 className="text-xl font-semibold mb-3 text-gray-800 dark:text-white">
                                    {service.title}
                                </h3>
                                <p className="text-gray-600 dark:text-gray-300 mb-5">
                                    {service.short || ""}
                                </p>
                                <motion.div whileHover={{ x: 5 }}>
                                    <a
                                        href={`/${service.slug}`}
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
