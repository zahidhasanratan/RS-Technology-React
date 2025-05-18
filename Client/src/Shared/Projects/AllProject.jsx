import { motion } from 'framer-motion';
import projectimg1 from "../../assets/rs-tech-asset/service-image-1.jpg";
import projectimg2 from "../../assets/rs-tech-asset/service-image-2.jpg";
import projectimg3 from "../../assets/rs-tech-asset/service-image-3.jpg";
import projectimg4 from "../../assets/rs-tech-asset/service-image-4.jpg";
import projectimg5 from "../../assets/rs-tech-asset/service-image-5.jpg";
import projectimg6 from "../../assets/rs-tech-asset/service-image-6.jpg";
import { Link } from 'react-router-dom';

const AllProject = () => {
    const fadeInUp = {
        hidden: { opacity: 0, y: 20 },
        visible: {
            opacity: 1,
            y: 0,
            transition: { duration: 0.6, ease: "easeOut" }
        }
    };

    const projects = [
        {
            id: 1,
            title: "Enterprise Network Solution",
            description: "Comprehensive networking solutions for businesses of all sizes.",
            image: projectimg1,
            delay: 0
        },
        {
            id: 2,
            title: "Enterprise CCTV Surveillance",
            description: "Advanced surveillance systems for complete security coverage.",
            image: projectimg2,
            delay: 0.2
        },
        {
            id: 3,
            title: "Video Surveillance Solutions",
            description: "Integrated video monitoring with centralized management.",
            image: projectimg3,
            delay: 0.4
        },
        {
            id: 4,
            title: "Video Conference System",
            description: "High-quality video conferencing for seamless communication.",
            image: projectimg4,
            delay: 0.6
        },
        {
            id: 5,
            title: "Public Address System",
            description: "Reliable audio systems for clear public announcements.",
            image: projectimg5,
            delay: 0.8
        },
        {
            id: 6,
            title: "IP PABX System",
            description: "Modern telephony solutions for efficient business communication.",
            image: projectimg6,
            delay: 1
        }
    ];

    return (
        <section className="py-5 lg:py-10 md:px-24 lg:px-24 bg-white">
            <div className="container mx-auto px-4">
                {/* Projects Grid */}
                <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 text-center">
                    {projects.map((project) => (
                        <motion.div
                            key={project.id}
                            initial="hidden"
                            whileInView="visible"
                            viewport={{ once: true }}
                            variants={fadeInUp}
                            transition={{ duration: 0.6, delay: project.delay }}
                            className="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300"
                        >
                            {/* Image with hover effect */}
                            <div className="relative group w-full h-48 overflow-hidden">
                                <img
                                    src={project.image}
                                    alt={project.title}
                                    className="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105"
                                />
                                <div className="absolute inset-0 pointer-events-none before:content-[''] before:absolute before:inset-0 before:bg-black before:rounded-full before:opacity-0 before:transition-all before:duration-700 group-hover:before:opacity-50 group-hover:before:scale-200 before:scale-0 before:origin-center mix-blend-overlay"></div>
                            </div>

                            {/* Content */}
                            <div className="p-6">
                                <h3 className="text-xl font-semibold mb-3 text-gray-800">
                                    {project.title}
                                </h3>
                                <p className="text-gray-600 mb-5">
                                    {project.description}
                                </p>
                                <div >
                                    <Link
                                        to="/projectdetails"
                                        className="inline-flex items-center font-bold text-indigo-900 hover:text-indigo-800 transition-colors"
                                    >
                                        View More
                                        <motion.svg whileHover={{ x: 5 }}
                                            className="w-6 h-6 ml-2 text-indigo-950 font-extrabold"
                                            fill="none"
                                            stroke="currentColor"
                                            viewBox="0 0 24 24"
                                            xmlns="http://www.w3.org/2000/svg"
                                        >
                                            <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                        </motion.svg>
                                    </Link>
                                </div>
                            </div>
                        </motion.div>
                    ))}
                </div>
            </div>
        </section>
    );
};

export default AllProject;