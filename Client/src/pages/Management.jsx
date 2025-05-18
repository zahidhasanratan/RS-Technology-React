import { motion } from 'framer-motion';
import teamImage from "../assets/rs-tech-asset/team-2.jpg";
import CommonHero from '../Shared/CommonHero';

const Management = () => {
    const teamMembers = [
        {
            id: 1,
            name: "Mr. John Doe",
            position: "Chief Executive Officer",
            image: teamImage,
            content: "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat...",
            delay: 0.2,
            imageLeft: true
        },
        {
            id: 2,
            name: "Mr. John Doe",
            position: "Chief Executive Officer",
            image: teamImage,
            content: "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat...",
            delay: 0.4,
            imageLeft: false
        },
        {
            id: 3,
            name: "Mr. John Doe",
            position: "Chief Executive Officer",
            image: teamImage,
            content: "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat...",
            delay: 0.6,
            imageLeft: true
        }
    ];

    const fadeInUp = {
        hidden: { opacity: 0, y: 40 },
        visible: { opacity: 1, y: 0 }
    };

    return (
        <div>
            <CommonHero title="management" />
            <section className="py-16 bg-gray-50">
                <div className="container mx-auto px-4">
                    <div className="relative max-w-7xl mx-auto">
                        {/* Timeline line */}
                        <div className="absolute left-1/2 md:left-6 h-full transform -translate-x-1/2 md:translate-x-0"></div>

                        {teamMembers.map((member) => (
                            <motion.div
                                key={member.id}
                                initial="hidden"
                                whileInView="visible"
                                viewport={{ once: true }}
                                variants={fadeInUp}
                                transition={{ duration: 0.6, delay: member.delay }}
                                className="relative mb-12 last:mb-0"
                            >
                                {/* Timeline dot */}
                                <div className="absolute left-1/2 md:left-6 h-4 w-4 rounded-full  transform -translate-x-1/2 md:translate-x-0 -translate-y-1/2 top-1/2"></div>

                                <div className={`group flex flex-col ${member.imageLeft ? 'md:flex-row' : 'md:flex-row-reverse'} items-center gap-6 md:gap-8 transition-all duration-300 bg-white rounded-xl p-4 hover:shadow-xl hover:-translate-y-1`}>
                                    {/* Image */}
                                    <div className="w-full md:w-1/5 flex justify-center">
                                        <div className="relative w-32 h-32 md:w-40 md:h-40 rounded-full overflow-hidden border-4 border-indigo-900 shadow-lg transition-transform duration-500 group-hover:scale-105">
                                            <img
                                                src={member.image}
                                                alt={member.name}
                                                className="w-full h-full object-cover"
                                            />
                                        </div>
                                    </div>

                                    {/* Content */}
                                    <div className="w-full md:w-4/5">
                                        <h3 className="text-xl font-bold text-indigo-900">{member.name}</h3>
                                        <p className="text-indigo-600 font-medium mb-4">{member.position}</p>
                                        <p className="text-gray-600">{member.content}</p>
                                    </div>
                                </div>
                            </motion.div>
                        ))}
                    </div>
                </div>
            </section>
        </div>
    );
};

export default Management;
