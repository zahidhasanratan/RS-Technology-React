import { FaArrowRight } from "react-icons/fa";
import CommonHero from "../CommonHero";
import { useNavigate, useLoaderData } from "react-router-dom";

export const JobDetails = () => {
    const navigate = useNavigate();
    const data = useLoaderData();

    return (
        <div>
            <CommonHero title="career" />
            <section className="py-4 md:px-24 lg:px-24">
                <div className="container mx-auto px-4">
                    <div className="flex flex-col lg:flex-row gap-8">
                        {/* Main Job Content */}
                        <div className="lg:w-3/4">
                            <div className="bg-white p-8 rounded-lg shadow-md">
                                <h1 className="text-3xl text-gray-800 mb-2">{data.title}</h1>

                                <div
                                    className="space-y-2 mb-1 text-sm"
                                    dangerouslySetInnerHTML={{ __html: data.description }}
                                />

                             <button
  onClick={() => navigate(`/apply/${data.slug || data.id}`)}
  className="flex items-center gap-2 px-6 py-2 bg-indigo-950 text-lg text-white font-semibold rounded-4xl hover:bg-indigo-900 transition-colors md:self-center"
>
  Apply Now
  <span className="text-base">
    <FaArrowRight />
  </span>
</button>

                            </div>
                        </div>

                        {/* Job Summary */}
                        <div className="lg:w-1/4">
                            <div className="bg-white text-sm rounded-lg p-2 shadow-md top-6">
                                <h3 className="font-bold bg-indigo-950 p-2 text-white mb-4">Job Summary</h3>
                                <div
                                    className="space-y-4 text-sm text-gray-700 [&>h4]:mb-2 [&>h4>span]:text-gray-600"
                                    dangerouslySetInnerHTML={{ __html: data.job_summery }}
                                />
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    );
};
