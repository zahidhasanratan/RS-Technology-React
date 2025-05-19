import { useEffect, useState } from 'react';
import { motion } from 'framer-motion';
import iconMission from "../../assets/rs-tech-asset/icon-mission.svg";
import iconVision from "../../assets/rs-tech-asset/icon-vision.svg";
import iconGoal from "../../assets/rs-tech-asset/icon-goal.svg";

const MissionVision = () => {
    const [data, setData] = useState(null);

    useEffect(() => {
        fetch('http://127.0.0.1:8000/api/objects6')
            .then(response => response.json())
            .then(data => setData(data[0])) // assuming it's an array with one object
            .catch(error => console.error("API Error:", error));
    }, []);

    if (!data) return null; // Optional: Show a loader or skeleton here

    return (
        <section className="bg-indigo-900 text-white">
            <div className="flex flex-col lg:flex-row">
                <div className="w-full lg:w-1/2 relative">
                    <div className="relative group w-full h-full overflow-hidden">
                        <img
                            src={data.image}
                            alt="Mission Vision"
                            className="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105"
                        />
                        <div className="absolute inset-0 pointer-events-none before:content-[''] before:absolute before:inset-0 before:bg-black before:rounded-full before:opacity-0 before:transition-all before:duration-700 group-hover:before:opacity-50 group-hover:before:scale-200 before:scale-0 before:origin-center mix-blend-overlay"></div>
                    </div>
                </div>

                {/* Content Section */}
                <div className="w-full lg:w-1/2 p-8 md:p-12 lg:p-16">
                    {/* Mission Item */}
                    <motion.div
                        initial={{ opacity: 0, y: 20 }}
                        whileInView={{ opacity: 1, y: 0 }}
                        viewport={{ once: true }}
                        transition={{ duration: 0.8, delay: 0.2 }}
                        className="mb-10"
                    >
                        <div className="flex items-start gap-6">
                            <div className="flex-shrink-0">
                                <img src={iconMission} alt="Mission" className="w-12 h-12" />
                            </div>
                            <div>
                                <h3 className="text-2xl font-bold mb-4">Our Mission</h3>
                                <p className="text-gray-300">{data.sub_title}</p>
                            </div>
                        </div>
                    </motion.div>

                    {/* Vision Item */}
                    <motion.div
                        initial={{ opacity: 0, y: 20 }}
                        whileInView={{ opacity: 1, y: 0 }}
                        viewport={{ once: true }}
                        transition={{ duration: 0.8, delay: 0.4 }}
                        className="mb-10"
                    >
                        <div className="flex items-start gap-6">
                            <div className="flex-shrink-0">
                                <img src={iconVision} alt="Vision" className="w-12 h-12" />
                            </div>
                            <div>
                                <h3 className="text-2xl font-bold mb-4">Our Vision</h3>
                                <p className="text-gray-300">{data.short}</p>
                            </div>
                        </div>
                    </motion.div>

                    {/* Values Item */}
                    <motion.div
                        initial={{ opacity: 0, y: 20 }}
                        whileInView={{ opacity: 1, y: 0 }}
                        viewport={{ once: true }}
                        transition={{ duration: 0.8, delay: 0.6 }}
                    >
                        <div className="flex items-start gap-6">
                            <div className="flex-shrink-0">
                                <img src={iconGoal} alt="Values" className="w-12 h-12" />
                            </div>
                            <div>
                                <h3 className="text-2xl font-bold mb-4">Our Values</h3>
                                <p className="text-gray-300">{data.description}</p>
                            </div>
                        </div>
                    </motion.div>
                </div>
            </div>
        </section>
    );
};

export default MissionVision;
