import { Component } from "@wordpress/element";
import { PanelBody, PanelRow, TextControl } from "@wordpress/components";
import { InspectorControls } from "@wordpress/editor";

class Headline extends Component {
    
    handleChange = (value) => {
        this.props.setAttributes({ headline: value });
    };

    render() {

        const { attributes } = this.props;
        const { headline } = attributes;

        return [
            <InspectorControls>
                <PanelBody title="Headline Settings">
                    <PanelRow className="d-block">
                        <TextControl
                            label="Add Headline" 
                            value={ headline }
                            onChange={value => this.handleChange(value)}
                        />
                    </PanelRow>
                </PanelBody>
            </InspectorControls>,

            <div>
                <PanelRow className="d-block">
                    <TextControl
                        label="Add Headline" 
                        value={ headline }
                        onChange={value => this.handleChange(value)}
                    />
                </PanelRow>
            </div>
        ]

    }

}

export default Headline