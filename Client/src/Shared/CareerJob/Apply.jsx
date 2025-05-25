import React, { useState, useEffect } from 'react';
import { useParams, useNavigate } from 'react-router-dom';
import Swal from 'sweetalert2';
import CommonHero from '../CommonHero';
import { FaArrowRight } from 'react-icons/fa';

export const Apply = () => {
    const { slugOrId } = useParams();
    const navigate = useNavigate();
    const [position, setPosition] = useState('');

    useEffect(() => {
        setPosition(slugOrId);
    }, [slugOrId]);

    const [formData, setFormData] = useState({
        fullName: '',
        email: '',
        phone: '',
        position: '',
        resume: null,
        message: ''
    });

    useEffect(() => {
        setFormData(prev => ({ ...prev, position }));
    }, [position]);

    const handleChange = (e) => {
        const { name, value, files } = e.target;
        setFormData(prev => ({
            ...prev,
            [name]: files ? files[0] : value
        }));
    };

    const handleSubmit = async (e) => {
        e.preventDefault();

        const formPayload = new FormData();
        formPayload.append('fullName', formData.fullName);
        formPayload.append('email', formData.email);
        formPayload.append('phone', formData.phone);
        formPayload.append('position', formData.position);
        formPayload.append('resume', formData.resume);
        formPayload.append('message', formData.message);

        try {
            const response = await fetch('https://server.rst-bd.com/api/apply', {
                method: 'POST',
                body: formPayload,
            });

            const data = await response.json();
            if (response.ok) {
                Swal.fire({
                    icon: 'success',
                    title: 'Application Submitted!',
                    text: data.message,
                    timer: 2000,
                    showConfirmButton: false
                });

                setFormData({
                    fullName: '',
                    email: '',
                    phone: '',
                    position: formData.position,
                    resume: null,
                    message: ''
                });

                document.getElementById('resume').value = '';

                setTimeout(() => {
                    navigate('/');
                }, 2000);
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Submission Failed',
                    text: data.message || 'Please try again.',
                });
            }
        } catch (error) {
            console.error('Error submitting form:', error);
            Swal.fire({
                icon: 'error',
                title: 'Server Error',
                text: 'An error occurred while submitting the form.',
            });
        }
    };

    return (
        <div>
            <CommonHero title='Career' />
            <section className="py-10 lg:py-16 bg-gray-50">
                <div className="container mx-auto px-4">
                    <div className="flex justify-center">
                        <div className="w-full max-w-2xl">
                            <div className="bg-white p-8 rounded-lg shadow-md">
                                <form onSubmit={handleSubmit} className="space-y-6" encType="multipart/form-data">
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
                                                required
                                                className="w-full px-4 py-2 border border-gray-300 rounded-md"
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
                                                required
                                                className="w-full px-4 py-2 border border-gray-300 rounded-md"
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
                                                required
                                                className="w-full px-4 py-2 border border-gray-300 rounded-md"
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
                                                readOnly
                                                className="w-full px-4 py-2 border border-gray-300 rounded-md bg-gray-100"
                                            />
                                        </div>
                                    </div>

                                    {/* Modified Upload Resume Field */}
                                    <div>
                                        <label htmlFor="resume" className="block text-md text-gray-500 mb-1">
                                            Upload Resume
                                        </label>
                                        <div className="flex items-center gap-4">
                                            <label
                                                htmlFor="resume"
                                                className="cursor-pointer inline-block px-4 py-2 bg-indigo-950 text-white text-sm font-medium rounded-md hover:bg-indigo-900 transition-colors"
                                            >
                                                Choose File
                                            </label>
                                            <span className="text-gray-600 text-sm truncate">
                                                {formData.resume ? formData.resume.name : 'No file selected'}
                                            </span>
                                        </div>
                                        <input
                                            type="file"
                                            id="resume"
                                            name="resume"
                                            onChange={handleChange}
                                            accept=".pdf,.doc,.docx"
                                            required
                                            className="hidden"
                                        />
                                    </div>

                                    <div>
                                        <label htmlFor="message" className="block text-md text-gray-500 mb-1">
                                            Cover Letter / Message
                                        </label>
                                        <textarea
                                            id="message"
                                            name="message"
                                            rows="5"
                                            value={formData.message}
                                            onChange={handleChange}
                                            className="w-full px-4 py-2 border border-gray-300 rounded-md"
                                        ></textarea>
                                    </div>

                                    <div className="flex">
                                        <button
                                            type="submit"
                                            className="flex items-center gap-2 px-6 py-2 bg-indigo-950 text-md text-white font-semibold rounded-4xl hover:bg-indigo-900 transition-colors"
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
