import { FaArrowRight } from "react-icons/fa";
import { useNavigate, useLoaderData } from "react-router-dom";

const CareerList = () => {
    const navigate = useNavigate();
    const jobOpenings = useLoaderData(); // Getting API data here

    return (
        <section className="py-6 px-6 lg:px-40 bg-gray-50">
            <div className="container mx-auto px-4">
                <div className="max-w-auto mx-auto">
                    <ul className="space-y-6">
                        {jobOpenings.map(job => (
                            <li key={job.id} className="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition-shadow">
                                <div className="flex flex-col md:flex-row md:justify-between md:items-start gap-4">
                                    <div className="flex-1">
                                        <h3 className="text-3xl mb-3 text-gray-800">{job.title}</h3>
                                        <p className="text-gray-600 mb-3">{job.location}</p>
                                        <ul className="flex gap-4 mb-3 px-4 list-disc list-inside">
                                            <li className="text-gray-600 text-sm">
                                                Job Function: {job.jobFunction || job.function}
                                            </li>
                                            <li className="text-gray-600 text-sm">
                                                Job Type: {job.jobType || job.type}
                                            </li>
                                        </ul>
                                    </div>
                                    <button
                                        onClick={() => navigate(`/careerDetails/${job.slug || job.id}`)}
                                        className="flex items-center gap-2 px-6 py-2 bg-indigo-950 text-lg text-white font-semibold rounded-xl hover:bg-indigo-900 transition-colors md:self-center"
                                    >
                                        View Details
                                        <span className="text-base">
                                            <FaArrowRight />
                                        </span>
                                    </button>
                                </div>
                            </li>
                        ))}
                    </ul>
                </div>
            </div>
        </section>
    );
};

export default CareerList;
