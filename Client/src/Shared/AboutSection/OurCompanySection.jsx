import { motion } from 'framer-motion';
import aboutImage from "../../assets/rs-tech-asset/about-2.png";
import im from "../../assets/rs-tech-asset/icon-sub-heading.svg"

const OurCompanySection = () => {
    return (
        <section className="py-10 md:py-16 bg-white">
            <div className="container mx-auto px-4">
                <div className="flex flex-col lg:flex-row items-center gap-12">
                    {/* Image Section with Circular Hover Effect */}
                    <motion.div
                        initial={{ opacity: 0, x: -40 }}
                        whileInView={{ opacity: 1, x: 0 }}
                        viewport={{ once: true }}
                        transition={{ duration: 0.8 }}
                        className="w-full lg:w-5/12"
                    >
                        <div className="relative group w-full h-64 md:h-80 lg:h-96 overflow-hidden rounded-xl shadow-xl">
                            <img
                                src={aboutImage}
                                alt="Our company"
                                className="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105"
                            />
                            <div className="absolute inset-0 pointer-events-none before:content-[''] before:absolute before:inset-0 before:bg-black before:rounded-full before:opacity-0 before:transition-all before:duration-700 group-hover:before:opacity-50 group-hover:before:scale-200 before:scale-0 before:origin-center mix-blend-overlay"></div>
                        </div>
                    </motion.div>

                    {/* Content Section */}
                    <motion.div
                        initial={{ opacity: 0, y: 40 }}
                        whileInView={{ opacity: 1, y: 0 }}
                        viewport={{ once: true }}
                        transition={{ duration: 0.8 }}
                        className="w-full lg:w-7/12"
                    >
                        <div className="space-y-6">
                            <motion.div
                                initial={{ opacity: 0 }}
                                whileInView={{ opacity: 1 }}
                                viewport={{ once: true }}
                                transition={{ duration: 0.8, delay: 0.1 }}
                                className="flex items-center gap-2"
                            >
                                <img src={im} alt="Icon" className="w-6 h-6" />
                                <h3 className="text-lg font-medium text-indigo-950">Our Company</h3>
                            </motion.div>

                            <motion.h2
                                initial={{ opacity: 0, y: 20 }}
                                whileInView={{ opacity: 1, y: 0 }}
                                viewport={{ once: true }}
                                transition={{ duration: 0.8, delay: 0.2 }}
                                className="text-3xl md:text-4xl font-bold text-gray-900"
                            >
                                <span className="text-indigo-900">Fast Growing Surveillance Solutions Provider Company</span>
                            </motion.h2>

                            <motion.p
                                initial={{ opacity: 0, y: 20 }}
                                whileInView={{ opacity: 1, y: 0 }}
                                viewport={{ once: true }}
                                transition={{ duration: 0.8, delay: 0.3 }}
                                className="text-gray-600 leading-relaxed"
                            >
                                Welcome to RS Technologies, the leading provider of innovative and reliable solutions for your enterprise needs. We are a team of passionate and experienced professionals who are committed to delivering the best value and quality to our customers.
                                <br /><br />
                                At RS Technologies, we understand the challenges and opportunities that enterprises face in the digital era. We offer a range of solutions and services that can help you optimize your network performance, enhance your security, and improve your collaboration. Whether you need to design, install, manage, or troubleshoot your network, we have the expertise and the tools to assist you.
                            </motion.p>
                        </div>
                    </motion.div>
                </div>
            </div>
        </section>
    );
};

export default OurCompanySection;