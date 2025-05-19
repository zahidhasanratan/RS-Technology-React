import { useEffect, useState } from "react";
import { motion } from "framer-motion";
import axios from "axios";

import img from "../assets/rs-tech-asset/icon-sub-heading.svg";
import img3 from "../assets/rs-tech-asset/about-3.png";
import contacticon from "../assets/rs-tech-asset/icon-about-contact.svg";
import experienceticon from "../assets/rs-tech-asset/icon-about-experience.svg";
import { FaArrowAltCircleRight } from "react-icons/fa";
import { Link } from "react-router-dom";
const AboutHome = () => {
    const [aboutData, setAboutData] = useState(null);

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

    useEffect(() => {
        axios.get("http://127.0.0.1:8000/api/object2")
            .then(res => {
                setAboutData(res.data[0]); // Assuming you always need the first object
            })
            .catch(err => console.error(err));
    }, []);

    if (!aboutData) return <div className="text-center py-20">Loading...</div>;

    return (
        <section className="py-8">
            <div className="container mx-auto px-4">
                <div className="flex flex-col lg:flex-row items-center lg:px-24">
                    {/* Images Section */}
                    <div className="w-full lg:w-1/2 relative h-[280px] sm:h-[350px] lg:h-[600px] mb-10 lg:mb-0 -mt-3 lg:-mt-24">
                        {/* Main Image */}
                        <motion.div
                            initial="hidden"
                            whileInView="visible"
                            viewport={{ once: true }}
                            variants={fadeInLeft}
                            transition={{ duration: 0.6 }}
                            className="absolute top-0 left-0 w-3/4 sm:w-2/3 lg:w-[75%] h-3/4 sm:h-[70%] lg:h-[80%] z-10"
                        >
                            <img
                                src={aboutData.image}
                                alt="Our company"
                                className="rounded-lg shadow-xl w-full h-full object-cover"
                            />
                        </motion.div>

                        {/* Secondary Image */}
                        <motion.div
                            initial="hidden"
                            whileInView="visible"
                            viewport={{ once: true }}
                            variants={fadeInRight}
                            transition={{ duration: 0.6, delay: 0.2 }}
                            className="absolute -bottom-10 lg:-bottom-20 right-0 w-2/3 sm:w-1/2 lg:w-[65%] h-2/3 sm:h-1/2 lg:h-[70%] z-20"
                        >
                            <img
                                src={aboutData.image2}
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
                            <div className="flex mb-2 mt-10 lg:mt-5 gap-2">
                                <img src={img} alt="" />
                                <h3 className="text-lg font-medium text-indigo-950">Our Company</h3>
                            </div>

                            <h2 className="text-3xl md:text-4xl font-bold mb-6">
                                <span className="text-indigo-900">{aboutData.sub_title}</span>
                            </h2>

                            <div className="text-gray-600 mb-8 leading-relaxed" dangerouslySetInnerHTML={{ __html: aboutData.short }}></div>
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
                                        src={aboutData.image3}
                                        alt="Our experience"
                                        className="rounded-3xl shadow-xl w-80 h-36 object-cover"
                                    />
                                </div>
                                <div>
                                    <div className="bg-indigo-950 p-3 rounded-full w-12 h-12 mb-2">
                                        <img src={experienceticon} alt="Experience" className="w-6 h-6" />
                                    </div>
                                    <h3 className="text-xl font-semibold text-gray-800">
                                        {aboutData.sub_title2}
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
                                            <a href={`tel:${aboutData.phone}`} className="text-indigo-600 hover:text-indigo-800">
                                                {aboutData.phone}
                                            </a>
                                        </h3>
                                    </div>
                                </div>

                               <Link
  to="/About"
  className="bg-indigo-950 hover:bg-indigo-900 text-white font-medium py-3 px-6 rounded-3xl transition duration-300 flex items-center gap-2"
>
  More About Us <span><FaArrowAltCircleRight /></span>
</Link>
                            </div>
                        </motion.div>
                    </div>
                </div>
            </div>
        </section>
    );
};

export default AboutHome;
