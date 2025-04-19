/**
 * Imports
 */
import { __ } from "@wordpress/i18n";
import { InspectorControls, useBlockProps } from "@wordpress/block-editor";
import { PanelBody, PanelRow, ToggleControl } from "@wordpress/components";
import ServerSideRender from "@wordpress/server-side-render";
import { SwiperInit } from "./swiper-init";
import { PanelColorSettings } from "@wordpress/block-editor";

/**
 * Export
 */
export default function Edit({ attributes, setAttributes }) {
	// Destructure all attributes
	const { navigation, arrowColor } = attributes;

	const swiper = SwiperInit(".swiper", { navigation });

	// Variable to store CSS custom property
	const sliderStyles = {
		"--arrow-color": arrowColor,
	};

	return (
		<>
			<InspectorControls>
				<PanelColorSettings
					title={__("Slider Settings")}
					colorSettings={[
						{
							value: arrowColor,
							label: __("Arrow color"),
							onChange: (value) => setAttributes({ arrowColor: value }),
						},
					]}
				/>
				<PanelBody title={__("Settings", "testimonial-slider")}>
					<PanelRow>
						<ToggleControl
							label={__("Navigation", "testimonial-slider")}
							checked={navigation}
							onChange={(value) => setAttributes({ navigation: value })}
							help={__(
								"Navigation will display arrows so users can navigate forward and backward.",
								"testimonial-slider",
							)}
						/>
					</PanelRow>
				</PanelBody>
			</InspectorControls>
			<div {...useBlockProps({ style: sliderStyles })}>
				<ServerSideRender
					block="valora-blocks/testimonial-slider"
					attributes={attributes}
				/>
			</div>
		</>
	);
}
