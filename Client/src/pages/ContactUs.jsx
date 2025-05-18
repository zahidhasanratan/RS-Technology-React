import { motion } from 'framer-motion';
import { BiPhone, BiEnvelope, BiMap, BiTimeFive, BiUser, BiSend } from 'react-icons/bi';
import CommonHero from '../Shared/CommonHero';

const ContactUs = () => {
    return (
        <div>
            <CommonHero title="Contact Us" />
            <section className="py-10 px-4 sm:px-6 lg:px-8 bg-[#f0f4f7]">
                <div className="max-w-6xl mx-auto">
                    <div className="grid grid-cols-1 lg:grid-cols-2 gap-8 items-start">
                        <motion.div
                            initial={{ opacity: 0, y: 20 }}
                            whileInView={{ opacity: 1, y: 0 }}
                            transition={{ duration: 0.6 }}
                            className="bg-white overflow-hidden">
                            <h2 className="text-xl font-bold text-white text-center p-2 bg-indigo-950">
                                Get In Touch With Us Now!
                            </h2>
                            <div className="p-6">
                                <div className="flex">
                                    <div className="flex-1 p-4 relative">
                                        <div className="flex flex-col items-center text-center">
                                            <div className="mb-4 inline-flex items-center justify-center bg-indigo-950 text-white text-2xl p-3 rounded-full">
                                                <BiPhone className="fill-current" />
                                            </div>
                                            <h3 className="font-bold text-gray-500 mb-2">Phone Number</h3>
                                            <div className="space-y-1 text-sm text-gray-400">
                                                <a href="tel:01916017508" className="block">
                                                    <span className="font-medium">Sales Query:</span> (+088) 01916017508
                                                </a>
                                                <a href="tel:01916017508" className="block ">
                                                    <span className="font-medium">Service Query:</span> (+088) 01916017508
                                                </a>
                                            </div>
                                        </div>
                                        <div className="absolute bottom-0 left-0 right-[10%] h-[2px]  bg-gray-300"></div>
                                    </div>
                                    <div className="relative">
                                        <div className="absolute top-[10%] bottom-[10%] left-0 w-[2px] bg-gray-300"></div>
                                    </div>
                                    <div className="flex-1 p-4 relative">
                                        <div className="flex flex-col items-center text-center">
                                            <div className="mb-4 inline-flex items-center justify-center bg-indigo-950 text-white text-2xl p-3 rounded-full">
                                                <BiEnvelope className="fill-current" />
                                            </div>
                                            <h3 className="font-bold text-gray-500 mb-2">Email</h3>
                                            <div className="space-y-1 text-sm text-gray-400">
                                                <a href="mailto:rejveee@gmail.com" className="block">
                                                    rejveee@gmail.com
                                                </a>
                                                <a href="mailto:info@gmail.com" className="block">
                                                    info@gmail.com
                                                </a>
                                            </div>
                                        </div>
                                        <div className="absolute bottom-0 left-[10%] right-0 h-[2px] bg-gray-300"></div>
                                    </div>
                                </div>
                                <div className="flex">
                                    <div className="flex-1 p-4">
                                        <div className="flex flex-col items-center text-center">
                                            <div className="mb-4 inline-flex items-center justify-center bg-indigo-950 text-white text-2xl p-3 rounded-full">
                                                <BiMap className="fill-current" />
                                            </div>
                                            <h3 className="font-bold text-gray-500 mb-2">Location</h3>
                                            <p className="text-sm text-gray-400">
                                                House# 9, Road# 2C, Block# J, Baridhara, Dhaka-1212
                                            </p>
                                        </div>
                                    </div>
                                    <div className="relative">
                                        <div className="absolute top-[10%] bottom-[10%] right-0 w-[2px] bg-gray-300"></div>
                                    </div>
                                    <div className="flex-1 p-4">
                                        <div className="flex flex-col items-center text-center">
                                            <div className="mb-4 inline-flex items-center justify-center bg-indigo-950 text-white text-2xl p-3 rounded-full">
                                                <BiTimeFive className="fill-current" />
                                            </div>
                                            <h3 className="font-bold text-gray-500 mb-2">Working Hours</h3>
                                            <p className="text-sm text-gray-400">
                                                Saturday to Thursday<br />
                                                09:00 AM to 06:00 PM
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </motion.div>

                        <motion.div
                            initial={{ opacity: 0, y: 20 }}
                            whileInView={{ opacity: 1, y: 0 }}
                            transition={{ duration: 0.6 }}
                            className=""
                        >
                            <h2 className="text-xl font-bold text-white text-center p-2 bg-indigo-950">Contact Us</h2>
                            <form className="p-6 space-y-4 bg-[#dddddd]">
                                <div className="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                    <div className="relative">
                                        <div className="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none text-gray-500">
                                            <BiUser className="fill-current" />
                                        </div>
                                        <input
                                            type="text"
                                            className="w-full pl-10 pr-4 py-2 bg-white rounded-lg border border-gray-300 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all"
                                            placeholder="First Name *"
                                            required
                                        />
                                    </div>
                                    <div className="relative">
                                        <div className="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none text-gray-500">
                                            <BiUser className="fill-current" />
                                        </div>
                                        <input
                                            type="text"
                                            className="w-full pl-10 pr-4 py-2 bg-white rounded-lg border border-gray-300 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all"
                                            placeholder="Last Name"
                                        />
                                    </div>
                                </div>

                                <div className="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                    <div className="relative">
                                        <div className="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none text-gray-500">
                                            <BiPhone className="fill-current" />
                                        </div>
                                        <input
                                            type="tel"
                                            className="w-full pl-10 pr-4 py-2 bg-white rounded-lg border border-gray-300 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all"
                                            placeholder="Mobile No *"
                                            required
                                        />
                                    </div>
                                    <div className="relative">
                                        <div className="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none text-gray-500">
                                            <BiEnvelope className="fill-current" />
                                        </div>
                                        <input
                                            type="email"
                                            className="w-full pl-10 pr-4 py-2 rounded-lg bg-white border border-gray-300 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all"
                                            placeholder="Email ID *"
                                            required
                                        />
                                    </div>
                                </div>
                                <div>
                                    <textarea
                                        rows={4}
                                        className="w-full px-4 py-2 rounded-lg border bg-white border-gray-300 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all"
                                        placeholder="Your Message"
                                    ></textarea>
                                </div>
                                <div className="rounded-lg">
                                    <label className="block text-sm font-medium text-gray-700 mb-2">
                                        Please type the characters <span className="text-red-500">*</span>
                                    </label>
                                    <input
                                        type="text"
                                        className="w-full px-4 py-2 rounded-lg border bg-white border-gray-300 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                                        required
                                    />
                                    <div className="mt-2 p-2 w-28 bg-white rounded font-mono text-lg text-center">
                                        p S † 5 s
                                    </div>
                                    <p className="mt-1 text-xs text-gray-500">
                                        This helps us prevent spam, thank you.
                                    </p>
                                </div>
                                <div className="text-center pt-2">
                                    <motion.button
                                        whileHover={{ scale: 1.03 }}
                                        whileTap={{ scale: 0.97 }}
                                        type="submit"
                                        className="bg-indigo-950 hover:bg-indigo-900 text-white font-medium py-3 px-8 rounded-lg transition-all duration-300 inline-flex items-center shadow-md"
                                    >
                                        Submit <BiSend className="ml-2 fill-current" />
                                    </motion.button>
                                </div>
                            </form>
                        </motion.div>
                    </div>
                </div>
            </section>
        </div>
    );
};

export default ContactUs;