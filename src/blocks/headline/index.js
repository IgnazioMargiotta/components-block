const { registerBlockType, getBlockDefaultClassName } = wp.blocks;
import edit from "./edit";

const attributes = {
    headline: {
        type: 'string'
    }
};

registerBlockType("components/headline", {
    title: "Headline",
    description: "Add Headline",
    icon: "laptop", // Choose an icon here: https://developer.wordpress.org/resource/dashicons/
    category: "components-block",
    keywords: [],

    attributes,

    edit,

    save: ({attributes}) => {
        const { headline } = attributes;
        const className = getBlockDefaultClassName("components/headline");
        return (
            <div className={`container-fluid`}>
                <h1 className={`${className}__headline`}> 
                    {headline}
                </h1>
            </div>
        )
    }
});
