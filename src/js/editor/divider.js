import React from 'react';
import styled from 'styled-components';
import cssThemes from '../../../css-themes';

const { registerBlockType, InspectorControls } = wp.blocks;
const { RangeControl } = wp.components;

const StyledForm = styled.form`
  margin-bottom: 1rem;
`;

const StyledRadioLabel = styled.label`
  display: block;
  margin-bottom: 0.5rem;
  text-transform: capitalize;
`;

const THEMES = cssThemes.themes.reduce(
  (output, theme) => Object.assign({}, output, { [theme.name]: theme }),
  {}
);

registerBlockType('colbycomms/divider', {
  title: 'Divider',

  category: 'layout',

  attributes: {
    color: {
      type: 'string',
    },
    height: {
      type: 'number',
    },
  },

  edit({ attributes, setAttributes, isSelected }) {
    let { color, height } = attributes;
    color = color || THEMES[cssThemes.defaultTheme]['background-color'];
    height = height || 32;

    const controls = isSelected && (
      <InspectorControls key="controls">
        <StyledForm
          onChange={event => {
            setAttributes({ color: event.target.value });
          }}
        >
          {cssThemes.themes.map(
            theme =>
              theme['background-color'] ? (
                <StyledRadioLabel key={theme.name}>
                  <input
                    type="radio"
                    value={theme['background-color']}
                    checked={color === theme['background-color']}
                  />
                  {theme.name.replace(/-/g, ' ')}
                </StyledRadioLabel>
              ) : null
          )}
        </StyledForm>
        <RangeControl
          label="Height (in pixels)"
          value={height}
          onChange={height => {
            setAttributes({ height });
          }}
          min={1}
          max={64}
        />
      </InspectorControls>
    );

    return [
      controls,
      <hr
        className="divider"
        style={{ borderTop: `${height}px solid ${color}` }}
      />,
    ];
  },

  save({ attributes }) {
    let { color, height } = attributes;
    color = color || THEMES[cssThemes.defaultTheme]['background-color'];
    height = height || 32;
    return (
      <hr
        className="divider"
        style={{ borderTop: `${height}px solid ${color}` }}
      />
    );
  },
});
