import { useState, useEffect } from 'react';
import { motion } from 'framer-motion';
import {
    BiPhone, BiEnvelope, BiMap, BiTimeFive, BiUser, BiSend
} from 'react-icons/bi';
import CommonHero from '../Shared/CommonHero';
import { toast, ToastContainer } from 'react-toastify';
import 'react-toastify/dist/ReactToastify.css';
import axios from 'axios';

const ContactUs = () => {
    const [captchaInput, setCaptchaInput] = useState('');
    const [captchaQuestion, setCaptchaQuestion] = useState('');
    const [captchaAnswer, setCaptchaAnswer] = useState(null);
    const [formData, setFormData] = useState({
        firstName: '',
        lastName: '',
        email: '',
        phone: '',
        message: ''
    });

    useEffect(() => {
        generateCaptcha();
    }, []);

    const generateCaptcha = () => {
        const a = Math.floor(Math.random() * 10) + 1;
        const b = Math.floor(Math.random() * 10) + 1;
        setCaptchaQuestion(`${a} + ${b} = ?`);
        setCaptchaAnswer(a + b);
        setCaptchaInput('');
    };

    const handleChange = (e) => {
        setFormData({ ...formData, [e.target.name]: e.target.value });
    };

    const handleSubmit = async (e) => {
    e.preventDefault();

    if (parseInt(captchaInput) !== captchaAnswer) {
        toast.error('Incorrect CAPTCHA. Please try again.', { position: "top-right" });
        generateCaptcha();
        return;
    }

    try {
        const response = await axios.post('http://127.0.0.1:8000/api/contact', {
            name: formData.firstName,
            lname: formData.lastName,
            email: formData.email,
            phone: formData.phone,
            address: "From Contact Form", // static if no field
            message: formData.message
        });

        toast.success('Your message has been sent!', { position: "top-right" });
        setFormData({ firstName: '', lastName: '', email: '', phone: '', message: '' });
        generateCaptcha();
    } catch (error) {
        console.error(error);
        toast.error('Failed to send. Please try again later.', { position: "top-right" });
    }
};

    return (
        <div>
            <CommonHero title="Contact Us" />
            <ToastContainer />
            <section className="py-10 px-4 sm:px-6 lg:px-8 bg-[#f0f4f7]">
                <div className="max-w-6xl mx-auto">
                    <div className="grid grid-cols-1 lg:grid-cols-2 gap-8 items-start">

                        {/* Contact Info */}
                        <motion.div
                            initial={{ opacity: 0, y: 20 }}
                            whileInView={{ opacity: 1, y: 0 }}
                            transition={{ duration: 0.6 }}
                        >
                            <div className="p-6 rounded-lg shadow-md bg-white">
                                <h2 className="text-2xl font-bold mb-4 text-indigo-800">Get in Touch</h2>
                                <div className="space-y-4 text-gray-700">
                                    <div className="flex items-center"><BiMap className="mr-2" /> 123 Street, Dhaka</div>
                                    <div className="flex items-center"><BiEnvelope className="mr-2" /> contact@example.com</div>
                                    <div className="flex items-center"><BiPhone className="mr-2" /> +880 1234-567890</div>
                                    <div className="flex items-center"><BiTimeFive className="mr-2" /> Mon-Fri, 9am - 5pm</div>
                                </div>
                            </div>
                        </motion.div>

                        {/* Contact Form */}
                        <motion.div
                            initial={{ opacity: 0, y: 20 }}
                            whileInView={{ opacity: 1, y: 0 }}
                            transition={{ duration: 0.6 }}
                        >
                            <h2 className="text-xl font-bold text-white text-center p-2 bg-indigo-950">Contact Us</h2>
                            <form onSubmit={handleSubmit} className="p-6 space-y-4 bg-[#dddddd] rounded">
                                <div className="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                    <div className="relative">
                                        <div className="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-500">
                                            <BiUser />
                                        </div>
                                        <input
                                            type="text"
                                            name="firstName"
                                            placeholder="First Name *"
                                            value={formData.firstName}
                                            onChange={handleChange}
                                            required
                                            className="w-full pl-10 pr-4 py-2 bg-white rounded-lg border border-gray-300 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                                        />
                                    </div>
                                    <div className="relative">
                                        <div className="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-500">
                                            <BiUser />
                                        </div>
                                        <input
                                            type="text"
                                            name="lastName"
                                            placeholder="Last Name"
                                            value={formData.lastName}
                                            onChange={handleChange}
                                            className="w-full pl-10 pr-4 py-2 bg-white rounded-lg border border-gray-300 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                                        />
                                    </div>
                                </div>

                                <div className="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                    <div className="relative">
                                        <div className="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-500">
                                            <BiPhone />
                                        </div>
                                        <input
                                            type="tel"
                                            name="phone"
                                            placeholder="Mobile No *"
                                            value={formData.phone}
                                            onChange={handleChange}
                                            required
                                            className="w-full pl-10 pr-4 py-2 bg-white rounded-lg border border-gray-300 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                                        />
                                    </div>
                                    <div className="relative">
                                        <div className="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-500">
                                            <BiEnvelope />
                                        </div>
                                        <input
                                            type="email"
                                            name="email"
                                            placeholder="Email ID *"
                                            value={formData.email}
                                            onChange={handleChange}
                                            required
                                            className="w-full pl-10 pr-4 py-2 bg-white rounded-lg border border-gray-300 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                                        />
                                    </div>
                                </div>

                                <div>
                                    <textarea
                                        rows="4"
                                        name="message"
                                        placeholder="Your Message"
                                        value={formData.message}
                                        onChange={handleChange}
                                        className="w-full px-4 py-2 bg-white rounded-lg border border-gray-300 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                                    ></textarea>
                                </div>

                                <div className="rounded-lg">
                                    <label className="block text-sm font-medium text-gray-700 mb-2">
                                        What is: <span className="font-bold">{captchaQuestion}</span>
                                    </label>
                                    <input
                                        type="text"
                                        required
                                        value={captchaInput}
                                        onChange={(e) => setCaptchaInput(e.target.value)}
                                        className="w-full px-4 py-2 rounded-lg border bg-white border-gray-300 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                                    />
                                    <p className="mt-1 text-xs text-gray-500">
                                        Simple human check to prevent spam.
                                    </p>
                                </div>

                                <div className="text-center pt-2">
                                    <motion.button
                                        whileHover={{ scale: 1.03 }}
                                        whileTap={{ scale: 0.97 }}
                                        type="submit"
                                        className="bg-indigo-950 hover:bg-indigo-900 text-white font-medium py-3 px-8 rounded-lg transition-all duration-300 inline-flex items-center shadow-md"
                                    >
                                        Submit <BiSend className="ml-2" />
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
