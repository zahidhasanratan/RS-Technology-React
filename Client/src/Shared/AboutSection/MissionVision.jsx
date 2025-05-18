import { motion } from 'framer-motion';
import missionVisionImg from "../../assets/rs-tech-asset/mission-vision-img.jpg";
import iconMission from "../../assets/rs-tech-asset/icon-mission.svg";
import iconVision from "../../assets/rs-tech-asset/icon-vision.svg";
import iconGoal from "../../assets/rs-tech-asset/icon-goal.svg";

const MissionVision = () => {
    return (
        <section className="bg-indigo-900 text-white">
            <div className="flex flex-col lg:flex-row">
                <div className="w-full lg:w-1/2 relative">
                    <div className="relative group w-full h-full overflow-hidden">
                        <img
                            src={missionVisionImg}
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
                                <p className="text-gray-300">
                                    Our mission is to be the leading technology service provider company in the country, offering a comprehensive range of solutions that cater to the needs and challenges of our clients. We are passionate about delivering solutions that are innovative, efficient, and secure, and that add value to our clients' businesses and operations. We aim to exceed client expectations through continuous innovation, exceptional service delivery, and a commitment to excellence. Our manifesto is to build relationships based on Trust, Value, Commitment and Respect.
                                </p>
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
                                <p className="text-gray-300">
                                    Our vision is to be the preferred partner of choice for our clients, providing them with the most innovative and reliable technology solutions that enhance their security, connectivity, and productivity. We aim to be the leader in the technology service industry, delivering excellence and value to our clients across various sectors and industries. We aspire to create a positive impact on the world through our solutions, which are designed to meet the current and future needs and challenges of our clients.
                                </p>
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
                                <p className="text-gray-300">
                                    Committed to conducting our business activities with integrity, honesty, and respect.
                                    Committed to putting our business partners first and building long-term partnerships.
                                    Passionate about our business partner's needs and support creative and progressive techniques.
                                    Dedicated toward providing a cost-effective service thus maximizing return on investment.
                                </p>
                            </div>
                        </div>
                    </motion.div>
                </div>
            </div>
        </section>
    );
};

export default MissionVision;