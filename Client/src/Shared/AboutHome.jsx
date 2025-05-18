import { motion } from 'framer-motion';
import img from "../assets/rs-tech-asset/icon-sub-heading.svg"
import img1 from "../assets/rs-tech-asset/about-img-1.jpg";
import img2 from "../assets/rs-tech-asset/about-2.png";
import img3 from "../assets/rs-tech-asset/about-3.png";
import contacticon from "../assets/rs-tech-asset/icon-about-contact.svg";
import experienceticon from "../assets/rs-tech-asset/icon-about-experience.svg";
import { FaArrowAltCircleRight } from 'react-icons/fa';

const AboutHome = () => {
    const fadeInUp = {
        hidden: { opacity: 0, y: 20 },
        visible: { opacity: 1, y: 0 }
    };

    const fadeInLeft = {
        hidden: { opacity: 0, x: -20 },
        visible: { opacity: 1, x: 0 }
    };

    const fadeInRight = {
        hidden: { opacity: 0, x: 20 },
        visible: { opacity: 1, x: 0 }
    };

    return (
        <section className="py-8">
            <div className="container mx-auto px-4">
                <div className="flex flex-col lg:flex-row items-center lg:px-24">
                    {/* Images Section */}
                    <div className="w-full lg:w-1/2 relative h-[280px] sm:h-[350px] lg:h-[600px] mb-10 lg:mb-0 -mt-3 lg:-mt-24">
                        {/* Main Image (Image 1) */}
                        <motion.div
                            initial="hidden"
                            whileInView="visible"
                            viewport={{ once: true }}
                            variants={fadeInLeft}
                            transition={{ duration: 0.6 }}
                            className="absolute top-0 left-0 w-3/4 sm:w-2/3 lg:w-[75%] h-3/4 sm:h-[70%] lg:h-[80%] z-10"
                        >
                            <img
                                src={img1}
                                alt="Our company"
                                className="rounded-lg shadow-xl w-full h-full object-cover"
                            />
                        </motion.div>

                        {/* Secondary Image (Image 2) */}
                        <motion.div
                            initial="hidden"
                            whileInView="visible"
                            viewport={{ once: true }}
                            variants={fadeInRight}
                            transition={{ duration: 0.6, delay: 0.2 }}
                            className="absolute -bottom-10 lg:-bottom-20 right-0 w-2/3 sm:w-1/2 lg:w-[65%] h-2/3 sm:h-1/2 lg:h-[70%] z-20"
                        >
                            <img
                                src={img2}
                                alt="Our team"
                                className="rounded-3xl shadow-xl w-full h-full object-cover"
                            />
                        </motion.div>
                    </div>



                    {/* Text Content */}
                    <div className="w-full lg:w-1/2 lg:pl-12">
                        <motion.div
                            initial="hidden"
                            whileInView="visible"
                            viewport={{ once: true }}
                            variants={fadeInUp}
                            transition={{ duration: 0.6 }}
                        >
                            <div className='flex mb-2 mt-10 lg:mt-5 gap-2'>
                                <img src={img} alt="" />
                                <h3 className="text-lg font-medium text-indigo-950">Our Company</h3>
                            </div>

                            <h2 className="text-3xl md:text-4xl font-bold mb-6">
                                <span className="text-indigo-900">Fast Growing Surveillance Solutions Provider Company</span>
                            </h2>

                            <p className="text-gray-600 mb-8 leading-relaxed">
                                Welcome to RS Technologies, the leading provider of innovative and reliable solutions for your enterprise needs. We are a team of passionate and experienced professionals who are committed to delivering the best value and quality to our customers.
                                <br /><br />
                                At RS Technologies, we understand the challenges and opportunities that enterprises face in the digital era. We offer a range of solutions and services that can help you optimize your network performance, enhance your security, and improve your collaboration. Whether you need to design, install, manage, or troubleshoot your network, we have the expertise and the tools to assist you.
                            </p>
                        </motion.div>

                        <motion.div
                            initial="hidden"
                            whileInView="visible"
                            viewport={{ once: true }}
                            variants={fadeInUp}
                            transition={{ duration: 0.6, delay: 0.2 }}
                            className="mb-8"
                        >
                            <div className="flex items-start">
                                <div className="mr-6">
                                    <img
                                        src={img3}
                                        alt="Our experience"
                                        className="rounded-3xl shadow-xl w-80 h-36 object-cover"
                                    />
                                </div>
                                <div>
                                    <div className="bg-indigo-950 p-3 rounded-full w-12 h-12 mb-2">
                                        <img src={experienceticon} alt="Experience" className="w-6 h-6" />
                                    </div>
                                    <h3 className="text-xl font-semibold text-gray-800">
                                        We Have More Than <span className="text-indigo-600">15+</span> Years of Communication Safety and Automation Sector
                                    </h3>
                                </div>
                            </div>
                        </motion.div>

                        <motion.div
                            initial="hidden"
                            whileInView="visible"
                            viewport={{ once: true }}
                            variants={fadeInUp}
                            transition={{ duration: 0.6, delay: 0.4 }}
                            className="bg-white p-6 md:p-8 rounded-3xl shadow-xl"
                        >
                            <div className="flex flex-col sm:flex-row items-center justify-between gap-4">
                                <div className="flex items-center">
                                    <div className="bg-indigo-950 p-3 rounded-full mr-4">
                                        <img src={contacticon} alt="Contact" className="w-6 h-6" />
                                    </div>
                                    <div>
                                        <p className="text-sm text-gray-500">Call Directly 24/7</p>
                                        <h3 className="text-xl font-semibold">
                                            <a href="tel:01916017508" className="text-indigo-600 hover:text-indigo-800">(+088) 01916017508</a>
                                        </h3>
                                    </div>
                                </div>

                                <button className="bg-indigo-950 hover:bg-indigo-900 text-white font-medium py-3 px-6 rounded-3xl transition duration-300 flex items-center gap-2">
                                    More About Us <span><FaArrowAltCircleRight /></span>
                                </button>
                            </div>
                        </motion.div>
                    </div>
                </div>
            </div>
        </section>
    );
};

export default AboutHome;
