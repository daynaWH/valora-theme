import { __ } from "@wordpress/i18n";
import {
	useBlockProps,
	InnerBlocks,
	InspectorControls,
} from "@wordpress/block-editor";
import { PanelBody, SelectControl } from "@wordpress/components";

export default function Edit({ attributes, setAttributes }) {
	const { animationType } = attributes;

	return (
		<>
			<InspectorControls>
				<PanelBody title={__("Animation Settings", "animate-wrapper")}>
					<SelectControl
						label={__("Animation Type", "animate-wrapper")}
						value={animationType}
						options={[
							{ label: "Fade Up", value: "fade-up" },
							{ label: "Fade Down", value: "fade-down" },
							{ label: "Fade Left", value: "fade-left" },
							{ label: "Fade Right", value: "fade-right" },
						]}
						onChange={(val) => setAttributes({ animationType: val })}
					/>
				</PanelBody>
			</InspectorControls>
			<div {...useBlockProps({ "data-aos": animationType })}>
				<InnerBlocks />
			</div>
		</>
	);
}
