import CommonHero from "../Shared/CommonHero";

const Video = () => {
    const videos = [
        { id: 'OG__SwkV3wg', title: 'Video 1' },
        { id: 'OG__SwkV3wg', title: 'Video 2' },
        { id: 'OG__SwkV3wg', title: 'Video 3' },
        { id: 'OG__SwkV3wg', title: 'Video 4' },
        { id: 'OG__SwkV3wg', title: 'Video 5' },
        { id: 'OG__SwkV3wg', title: 'Video 6' },
    ];

    return (
        <div>
            <CommonHero title="Video Gallery" />
            <div className="py-4 md:px-24 lg:px-24">
                <div className="max-w-7xl mx-auto">
                    <div className="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                        {videos.map((video, index) => (
                            <div
                                key={index}
                                className="overflow-hidden rounded-lg shadow-lg transition-all duration-300 hover:shadow-xl"
                            >
                                <div className="aspect-w-16 aspect-h-9">
                                    <iframe
                                        src={`https://www.youtube.com/embed/${video.id}`}
                                        title={video.title}
                                        className="w-full h-48 sm:h-56 md:h-64"
                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                        allowFullScreen
                                    />
                                </div>

                            </div>
                        ))}
                    </div>
                </div>
            </div>
        </div>
    );
};

export default Video;