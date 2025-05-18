import img from "../assets/rs-tech-asset/service-image-1.jpg";
import { motion } from "framer-motion";
import CommonHero from "./CommonHero";
import { FaArrowRight, FaCheckCircle } from "react-icons/fa";

const SingleSolution = () => {
    const solutions = [
        "Enterprise Network Solution",
        "Enterprise CCTV Surveillance Solution",
        "Centralized Video Surveillance Solutions",
        "Digital Video Conference System",
        "Public Address (PA) System",
        "IP PABX System"
    ];

    return (
        <div>
            <CommonHero title="Enterprise Solution Network" />
            <div className="py-4 md:px-4 lg:px-24">
                <div className="container mx-auto px-4">
                    <div className="flex flex-col lg:flex-row gap-8">
                        {/* Sidebar - Our Solutions */}
                        <div className="w-full  lg:w-1/3">
                            <motion.div
                                initial={{ opacity: 0, y: 20 }}
                                animate={{ opacity: 1, y: 0 }}
                                transition={{ duration: 0.5 }}
                                className="sticky top-0 bg-[#f8f8f8] p-6 rounded-lg shadow-md"
                            >
                                <h3 className="text-2xl font-bold text-indigo-950 mb-6 pb-2">
                                    Our Solutions
                                </h3>
                                <ul className="space-y-3">
                                    {solutions.map((solution, index) => (
                                        <a
                                            href="#"
                                            key={index}
                                            className="relative block py-3 px-3 mb-5 bg-white rounded-2xl overflow-hidden group text-indigo-950"
                                        >
                                            <span className="relative z-10 group-hover:text-white transition-colors duration-500 flex justify-between items-center">
                                                <span>{solution}</span>
                                                <div className="rounded-full bg-indigo-950 p-2 text-xs text-white">
                                                    <FaArrowRight />
                                                </div>

                                            </span>
                                            <span className="absolute inset-0 bg-indigo-950 -translate-y-full group-hover:translate-y-0 transition-transform duration-700 ease-in-out z-0"></span>
                                        </a>
                                    ))}
                                </ul>
                            </motion.div>
                        </div>

                        {/* Main Content */}
                        <div className="w-full lg:w-2/3">
                            <motion.div
                                initial={{ opacity: 0 }}
                                animate={{ opacity: 1 }}
                                transition={{ duration: 0.5, delay: 0.2 }}
                                className=" overflow-hidden"
                            >
                                {/* Featured Image */}
                                <div className="relative overflow-hidden group rounded-3xl">
                                    <motion.img
                                        src={img}
                                        alt="CCTV Installation"
                                        className="w-full h-auto object-cover mb-4 rounded-3xl"
                                        initial={{ scale: 1 }}
                                        whileHover={{ scale: 1.1 }}
                                        transition={{ duration: 0.7 }}
                                    />
                                    <div className="absolute inset-0 pointer-events-none before:content-[''] before:absolute before:inset-0 before:bg-black before:rounded-full before:opacity-0 before:transition-all before:duration-700 group-hover:before:opacity-50 group-hover:before:scale-200 before:scale-0 before:origin-center mix-blend-overlay"></div>
                                </div>


                                {/* Service Content */}
                                <div className="p-6 md:p-8">
                                    <div className="prose max-w-none">
                                        <p className="text-gray-700 mb-4">
                                            CCTV installation is a crucial step in safeguarding homes, businesses, and public spaces.
                                            A well-placed surveillance system provides real-time monitoring, deters potential threats,
                                            and ensures a secure environment.
                                        </p>
                                        <p className="text-gray-700 mb-6">
                                            A properly installed CCTV system not only helps in crime prevention but also aids in
                                            investigations by providing clear and recorded footage. Businesses benefit from increased
                                            employee and asset protection, while homeowners gain peace of mind knowing their loved
                                            ones and property are secure.
                                        </p>

                                        {/* Service Overview Box */}
                                        <div className=" p-6 rounded-lg mb-6">
                                            <h2 className="text-5xl font-extrabold text-indigo-950 mb-4">
                                                Service overview
                                            </h2>
                                            <p className="text-gray-700 mb-4">
                                                Our comprehensive security solutions are designed to meet the unique needs of homes,
                                                businesses, and industrial spaces. From advanced CCTV installation to remote monitoring
                                                and maintenance, we ensure reliable protection with cutting-edge technology.
                                            </p>
                                            <ul className="pl-5 space-y-2 text-xl text-gray-700">
                                                <li className="flex items-start gap-2 text-gray-700">
                                                    <FaCheckCircle className="text-xl bg-indigo-600  bg-clip-text" />
                                                    <span>Advanced surveillance solutions to protect what matters most.</span>
                                                </li>
                                                <li className="flex items-start gap-2 text-gray-700">
                                                    <FaCheckCircle className="text-xl bg-indigo-950  bg-clip-text" />
                                                    <span>Committed to innovation, reliability, and peace of mind.</span>
                                                </li>
                                            </ul>
                                        </div>

                                    </div>
                                </div>
                            </motion.div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    );
};

export default SingleSolution;