import React, { useEffect, useState, useRef } from 'react';
import axios from 'axios';
import { motion } from 'framer-motion';
import { toast, ToastContainer } from 'react-toastify';
import 'react-toastify/dist/ReactToastify.css';
import {
    BiPhone, BiEnvelope, BiMap, BiTimeFive,
    BiUser, BiSend
} from 'react-icons/bi';
import CommonHero from '../Shared/CommonHero';

const ContactUs = () => {
    const [captchaInput, setCaptchaInput] = useState('');
    const [captchaQuestion, setCaptchaQuestion] = useState('');
    const [captchaAnswer, setCaptchaAnswer] = useState(null);
    const [contactInfo, setContactInfo] = useState(null);
    const [formData, setFormData] = useState({
        firstName: '',
        lastName: '',
        email: '',
        phone: '',
        message: ''
    });
    const captchaRef = useRef(null);

    useEffect(() => {
        generateCaptcha();
        fetchContactInfo();
    }, []);

    const generateCaptcha = () => {
        const a = Math.floor(Math.random() * 10) + 1;
        const b = Math.floor(Math.random() * 10) + 1;
        setCaptchaQuestion(`${a} + ${b} = ?`);
        setCaptchaAnswer(a + b);
        setCaptchaInput('');
    };

    const fetchContactInfo = async () => {
        try {
            const response = await axios.get('https://server.rst-bd.com/api/footercontact');
            if (response.data && response.data.length > 0) {
                setContactInfo(response.data[0]);
            }
        } catch (error) {
            console.error('Failed to fetch contact info:', error);
        }
    };

    const handleChange = (e) => {
        setFormData({ ...formData, [e.target.name]: e.target.value });
    };

    const handleSubmit = async (e) => {
        e.preventDefault();

        if (parseInt(captchaInput.trim(), 10) !== captchaAnswer) {
            toast.error('Incorrect CAPTCHA. Please try again.');
            generateCaptcha();
            captchaRef.current?.focus();
            return;
        }

        try {
            await axios.post('https://server.rst-bd.com/api/contact', {
                name: formData.firstName.trim(),
                lname: formData.lastName.trim(),
                email: formData.email.trim(),
                phone: formData.phone.trim(),
                address: "From Contact Form",
                message: formData.message.trim()
            });

            toast.success('Your message has been sent!');
            setFormData({
                firstName: '', lastName: '', email: '', phone: '', message: ''
            });
            generateCaptcha();
        } catch (error) {
            console.error('Form submission error:', error);
            toast.error('Failed to send message. Try again later.');
        }
    };

    return (
        <div>
            <ToastContainer />
            <CommonHero title="Contact Us" />

            <section className="py-10 px-4 sm:px-6 lg:px-8 bg-[#f0f4f7]">
                <div className="max-w-6xl mx-auto grid lg:grid-cols-2 gap-8">

                    {/* Contact Info */}
                    <motion.div
                        initial={{ opacity: 0, y: 20 }}
                        whileInView={{ opacity: 1, y: 0 }}
                        transition={{ duration: 0.6 }}
                        className="bg-white"
                    >
                        <h2 className="text-xl font-bold text-white text-center p-2 bg-indigo-950">
                            Get In Touch With Us Now!
                        </h2>
                        <div className="p-6">
    {/* First Row: Phone & Email */}
    <div className="flex">
        {/* Phone Section */}
        <div className="flex-1 p-4 relative">
            <div className="flex flex-col items-center text-center">
                <div className="mb-4 inline-flex items-center justify-center bg-indigo-950 text-white text-2xl p-3 rounded-full">
                    <BiPhone className="fill-current" />
                </div>
                <h3 className="font-bold text-gray-500 mb-2">Phone Number</h3>
                <div className="space-y-1 text-sm text-gray-400">
                    <a href={`tel:${contactInfo?.slug || ''}`} className="block">
                        <span className="font-medium">Sales Query:</span> {contactInfo?.slug || 'N/A'}
                    </a>
                    <a href={`tel:${contactInfo?.title2 || ''}`} className="block">
                        <span className="font-medium">Service Query:</span> {contactInfo?.title2 || 'N/A'}
                    </a>
                </div>
            </div>
            <div className="absolute bottom-0 left-0 right-[10%] h-[2px] bg-gray-300"></div>
        </div>

        {/* Vertical Divider */}
        <div className="relative">
            <div className="absolute top-[10%] bottom-[10%] left-0 w-[2px] bg-gray-300"></div>
        </div>

        {/* Email Section */}
        <div className="flex-1 p-4 relative">
            <div className="flex flex-col items-center text-center">
                <div className="mb-4 inline-flex items-center justify-center bg-indigo-950 text-white text-2xl p-3 rounded-full">
                    <BiEnvelope className="fill-current" />
                </div>
                <h3 className="font-bold text-gray-500 mb-2">Email</h3>
                <div className="space-y-1 text-sm text-gray-400">
                    <a href={`mailto:${contactInfo?.description || ''}`} className="block">
                        {contactInfo?.description || 'N/A'}
                    </a>
                    {contactInfo?.slug2 && (
                        <a href={`mailto:${contactInfo?.slug2}`} className="block">
                            {contactInfo?.slug2}
                        </a>
                    )}
                </div>
            </div>
            <div className="absolute bottom-0 left-[10%] right-0 h-[2px] bg-gray-300"></div>
        </div>
    </div>

    {/* Second Row: Location & Hours */}
    <div className="flex">
        {/* Location Section */}
        <div className="flex-1 p-4">
            <div className="flex flex-col items-center text-center">
                <div className="mb-4 inline-flex items-center justify-center bg-indigo-950 text-white text-2xl p-3 rounded-full">
                    <BiMap className="fill-current" />
                </div>
                <h3 className="font-bold text-gray-500 mb-2">Location</h3>
                <p className="text-sm text-gray-400">{contactInfo?.title || 'N/A'}</p>
            </div>
        </div>

        {/* Vertical Divider */}
        <div className="relative">
            <div className="absolute top-[10%] bottom-[10%] right-0 w-[2px] bg-gray-300"></div>
        </div>

        {/* Working Hours Section */}
        <div className="flex-1 p-4">
            <div className="flex flex-col items-center text-center">
                <div className="mb-4 inline-flex items-center justify-center bg-indigo-950 text-white text-2xl p-3 rounded-full">
                    <BiTimeFive className="fill-current" />
                </div>
                <h3 className="font-bold text-gray-500 mb-2">Working Hours</h3>
                <p className="text-sm text-gray-400">
                    {contactInfo?.working?.split('\n').map((line, index) => (
                        <span key={index}>{line}<br /></span>
                    )) || 'N/A'}
                </p>
            </div>
        </div>
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
                        <form onSubmit={handleSubmit} className="p-6 bg-[#dddddd] rounded space-y-4">
                            <div className="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                {/* First Name */}
                                <div className="relative">
                                    <label htmlFor="firstName" className="sr-only">First Name</label>
                                    <BiUser className="absolute left-3 top-3 text-gray-500" />
                                    <input
                                        id="firstName"
                                        name="firstName"
                                        type="text"
                                        placeholder="First Name *"
                                        value={formData.firstName}
                                        onChange={handleChange}
                                        required
                                        className="w-full pl-10 pr-4 py-2 rounded border border-gray-300 bg-white"
                                    />
                                </div>
                                {/* Last Name */}
                                <div className="relative">
                                    <label htmlFor="lastName" className="sr-only">Last Name</label>
                                    <BiUser className="absolute left-3 top-3 text-gray-500" />
                                    <input
                                        id="lastName"
                                        name="lastName"
                                        type="text"
                                        placeholder="Last Name"
                                        value={formData.lastName}
                                        onChange={handleChange}
                                        className="w-full pl-10 pr-4 py-2 rounded border border-gray-300 bg-white"
                                    />
                                </div>
                            </div>

                            <div className="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                {/* Phone */}
                                <div className="relative">
                                    <label htmlFor="phone" className="sr-only">Phone</label>
                                    <BiPhone className="absolute left-3 top-3 text-gray-500" />
                                    <input
                                        id="phone"
                                        name="phone"
                                        type="tel"
                                        placeholder="Phone *"
                                        value={formData.phone}
                                        onChange={handleChange}
                                        required
                                        className="w-full pl-10 pr-4 py-2 rounded border border-gray-300 bg-white"
                                    />
                                </div>
                                {/* Email */}
                                <div className="relative">
                                    <label htmlFor="email" className="sr-only">Email</label>
                                    <BiEnvelope className="absolute left-3 top-3 text-gray-500" />
                                    <input
                                        id="email"
                                        name="email"
                                        type="email"
                                        placeholder="Email *"
                                        value={formData.email}
                                        onChange={handleChange}
                                        required
                                        className="w-full pl-10 pr-4 py-2 rounded border border-gray-300 bg-white"
                                    />
                                </div>
                            </div>

                            {/* Message */}
                            <div>
                                <label htmlFor="message" className="sr-only">Message</label>
                                <textarea
                                    id="message"
                                    name="message"
                                    rows="4"
                                    placeholder="Your Message *"
                                    value={formData.message}
                                    onChange={handleChange}
                                    required
                                    className="w-full px-4 py-2 rounded border border-gray-300 bg-white"
                                />
                            </div>

                            {/* CAPTCHA */}
                            <div className="flex items-center gap-4">
                                <label htmlFor="captcha" className="text-gray-700">{captchaQuestion}</label>
                                <input
                                    id="captcha"
                                    type="text"
                                    value={captchaInput}
                                    onChange={(e) => setCaptchaInput(e.target.value)}
                                    ref={captchaRef}
                                    required
                                    className="w-24 px-2 py-1 border border-gray-300 rounded bg-white"
                                />
                            </div>

                            {/* Submit */}
                            <button
                                type="submit"
                                className="w-full bg-indigo-950 text-white font-semibold py-2 px-4 rounded hover:bg-indigo-800"
                            >
                                <BiSend className="inline-block mr-2" />
                                Send Message
                            </button>
                        </form>
                    </motion.div>
                </div>
            </section>
        </div>
    );
};

export default ContactUs;
