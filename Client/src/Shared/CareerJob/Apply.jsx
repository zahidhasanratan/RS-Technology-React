import React, { useState } from 'react';
import CommonHero from '../CommonHero';
import { FaArrowRight } from 'react-icons/fa';

const Apply = () => {
    const [formData, setFormData] = useState({
        fullName: '',
        email: '',
        phone: '',
        position: '',
        resume: null,
        message: ''
    });

    const handleChange = (e) => {
        const { name, value, files } = e.target;
        setFormData(prev => ({
            ...prev,
            [name]: files ? files[0] : value
        }));
    };

    const handleSubmit = (e) => {
        e.preventDefault();

        console.log('Form submitted:', formData);

    };

    return (
        <div>
            <CommonHero title='Career' />
            <section className="py-10 lg:py-16 bg-gray-50">
                <div className="container mx-auto px-4">
                    <div className="flex justify-center">
                        <div className="w-full max-w-2xl">
                            <div className="bg-white p-8 rounded-lg shadow-md">
                                <form onSubmit={handleSubmit} className="space-y-6">
                                    <div className="grid grid-cols-1 md:grid-cols-2 gap-6">
                                        <div>
                                            <label htmlFor="fullName" className="block text-md text-gray-500 mb-1">
                                                Full Name
                                            </label>
                                            <input
                                                type="text"
                                                id="fullName"
                                                name="fullName"
                                                value={formData.fullName}
                                                onChange={handleChange}
                                                className="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500"
                                                required
                                            />
                                        </div>

                                        <div>
                                            <label htmlFor="email" className="block text-md text-gray-500 mb-1">
                                                Email Address
                                            </label>
                                            <input
                                                type="email"
                                                id="email"
                                                name="email"
                                                value={formData.email}
                                                onChange={handleChange}
                                                className="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500"
                                                required
                                            />
                                        </div>

                                        <div>
                                            <label htmlFor="phone" className="block text-md text-gray-500 mb-1">
                                                Phone Number
                                            </label>
                                            <input
                                                type="tel"
                                                id="phone"
                                                name="phone"
                                                value={formData.phone}
                                                onChange={handleChange}
                                                className="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500"
                                                required
                                            />
                                        </div>

                                        <div>
                                            <label htmlFor="position" className="block text-md text-gray-500 mb-1">
                                                Position Applying For
                                            </label>
                                            <input
                                                type="text"
                                                id="position"
                                                name="position"
                                                value={formData.position}
                                                onChange={handleChange}
                                                className="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500"
                                            />
                                        </div>
                                    </div>

                                    <div>
                                        <label htmlFor="resume" className="block text-md text-gray-500 mb-1">
                                            Upload Resume
                                        </label>
                                        <input
                                            type="file"
                                            id="resume"
                                            name="resume"
                                            onChange={handleChange}
                                            accept=".pdf,.doc,.docx"
                                            className="block w-full text-sm text-gray-800 border border-gray-300 rounded-md
                      file:mr-4 file:py-2 file:px-4
                      file:rounded-md file:border-0
                      file:text-sm 
                      file:bg-blue-50 file:text-gray-800
                      hover:file:bg-blue-100"
                                            required
                                        />
                                    </div>

                                    <div>
                                        <label htmlFor="message" className="block text-md  text-gray-500 mb-1">
                                            Cover Letter / Message
                                        </label>
                                        <textarea
                                            id="message"
                                            name="message"
                                            rows="5"
                                            value={formData.message}
                                            onChange={handleChange}
                                            className="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500"
                                        ></textarea>
                                    </div>

                                    <div className="flex ">
                                        <button
                                            className="flex items-center gap-2 px-6 py-2 bg-indigo-950 text-md text-white font-semibold rounded-4xl hover:bg-indigo-900 transition-colors md:self-center"
                                        >
                                            Submit Application
                                            <span className="text-base">
                                                <FaArrowRight />
                                            </span>
                                        </button>

                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    );
};

export default Apply;