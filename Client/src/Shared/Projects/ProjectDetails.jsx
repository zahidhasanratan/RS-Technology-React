import { useState } from 'react';
import { motion } from 'framer-motion';
import { FaArrowLeft, FaCheckCircle } from 'react-icons/fa';
import { useNavigate } from 'react-router-dom'; // Add this import
import projectimg1 from "../../assets/rs-tech-asset/service-image-1.jpg";
import CommonHero from '../CommonHero';

const ProjectDetails = ({ project }) => {
    const [isImageHovered, setIsImageHovered] = useState(false);
    const navigate = useNavigate();
    const sampleProject = {
        id: 1,
        title: "Enterprise Network Solution",
        subtitle: "High-performance networking infrastructure",
        description: "Comprehensive networking solutions for businesses of all sizes.",
        details: "Our enterprise network solution provides robust, scalable infrastructure...",
        image: projectimg1,
        features: [
            "Scalable architecture",
            "24/7 monitoring",
            "Enterprise-grade security",
            "High availability",
            "Custom configurations"
        ],
        technologies: ["Cisco", "Juniper", "SD-WAN", "VPN", "Firewalls"],
    };
    const currentProject = project || sampleProject;

    const handleBack = () => {
        navigate(-1);
    };

    return (
        <div>
            <CommonHero title='completed project' />
            <div className="w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
                <motion.div
                    initial={{ opacity: 0 }}
                    animate={{ opacity: 1 }}
                    transition={{ duration: 0.5 }}
                    className="bg-white rounded-xl overflow-hidden shadow-lg"
                >
                    <div className="p-6 md:p-8">
                        <button
                            onClick={handleBack}
                            className="flex items-center text-indigo-900 hover:text-indigo-800 transition-colors mb-6 group"
                        >
                            <motion.div
                                whileHover={{ x: -5 }}
                                transition={{ duration: 0.2 }}
                                className="flex items-center"
                            >
                                <FaArrowLeft className="mr-2 transition-transform group-hover:-translate-x-1" />
                                <span>Back to Projects</span>
                            </motion.div>
                        </button>
                        <div className="mb-8">
                            <h1 className="text-3xl md:text-4xl font-bold text-gray-900 mb-2">
                                {currentProject.title}
                            </h1>
                            {currentProject.subtitle && (
                                <p className="text-lg text-indigo-950 font-medium mb-4">
                                    {currentProject.subtitle}
                                </p>
                            )}
                        </div>

                        <div
                            className="relative w-full h-64 md:h-80 lg:h-96 rounded-xl overflow-hidden mb-8 shadow-md"
                            onMouseEnter={() => setIsImageHovered(true)}
                            onMouseLeave={() => setIsImageHovered(false)}
                        >
                            <motion.img
                                src={currentProject.image}
                                alt={currentProject.title}
                                className="w-full h-full object-cover "
                                initial={{ scale: 1 }}
                                animate={{ scale: isImageHovered ? 1.05 : 1 }}
                                transition={{ duration: 0.5 }}
                            />
                            <div className="absolute inset-0 pointer-events-none before:content-[''] before:absolute before:inset-0 before:bg-black before:rounded-full before:opacity-0 before:transition-all before:duration-700 group-hover:before:opacity-50 group-hover:before:scale-200 before:scale-0 before:origin-center mix-blend-overlay"></div>
                        </div>

                        <div className="grid grid-cols-1 lg:grid-cols-3 gap-8 p-6 md:p-8">
                            <div className="lg:col-span-2">
                                <div className="prose max-w-none">
                                    <h2 className="text-2xl font-bold text-gray-800 mb-4">Project Overview</h2>
                                    <p className="text-gray-700 mb-6 text-lg leading-relaxed">
                                        {currentProject.description}
                                    </p>

                                    {currentProject.details && (
                                        <>
                                            <h3 className="text-xl font-semibold text-gray-800 mb-3">Detailed Description</h3>
                                            <p className="text-gray-700 mb-6 text-lg leading-relaxed">
                                                {currentProject.details}
                                            </p>
                                        </>
                                    )}
                                </div>
                            </div>
                            <div className="lg:col-span-1">
                                <div className="bg-gray-50 p-6 rounded-xl shadow-sm border border-gray-100">
                                    <h3 className="text-xl font-bold text-gray-800 mb-4">Key Features</h3>
                                    <ul className="space-y-3">
                                        {currentProject.features?.map((feature, index) => (
                                            <motion.li
                                                key={index}
                                                className="flex items-start"
                                                whileHover={{ x: 5 }}
                                                transition={{ type: 'spring', stiffness: 300 }}
                                            >
                                                <FaCheckCircle className="text-indigo-900 mt-1 mr-3 flex-shrink-0" />
                                                <span className="text-gray-700">{feature}</span>
                                            </motion.li>
                                        ))}
                                    </ul>

                                    {currentProject.technologies && (
                                        <>
                                            <h3 className="text-xl font-bold text-gray-800 mt-8 mb-4">Technologies Used</h3>
                                            <div className="flex flex-wrap gap-2">
                                                {currentProject.technologies.map((tech, index) => (
                                                    <motion.span
                                                        key={index}
                                                        whileHover={{ y: -3 }}
                                                        className="bg-indigo-100 text-indigo-950 px-3 py-1 rounded-full text-sm font-medium"
                                                    >
                                                        {tech}
                                                    </motion.span>
                                                ))}
                                            </div>
                                        </>
                                    )}
                                </div>
                            </div>
                        </div>
                    </div>
                </motion.div>
            </div>
        </div>
    );
};

export default ProjectDetails;