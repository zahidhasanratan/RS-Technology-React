import { motion } from 'framer-motion';

const CommonHero = ({ title = "" }) => {
    return (
        <div className="relative h-24 md:h-64 lg:h-64 pt-4 lg:pt-24 w-full bg-indigo-950 overflow-hidden flex items-center justify-center">
            <motion.div
                initial={{ opacity: 0, y: 40 }}
                animate={{ opacity: 1, y: 0 }}
                transition={{
                    duration: 0.8,
                    ease: [0.16, 0.77, 0.47, 0.97]
                }}
                className="text-center"
            >
                <h1 className="text-4xl  font-extrabold uppercase text-white tracking-tight">
                    {title}
                </h1>

                <motion.div
                    initial={{ scaleX: 0 }}
                    animate={{ scaleX: 1 }}
                    transition={{
                        delay: 0.3,
                        duration: 0.6,
                        ease: "easeOut"
                    }}

                />
            </motion.div>
        </div>
    );
};

export default CommonHero;