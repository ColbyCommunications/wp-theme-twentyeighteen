import React from 'react';
import styled from 'styled-components';
import cssThemes from '../../../css-themes';

const { registerBlockType, InspectorControls, InnerBlocks } = wp.blocks;

const StyledForm = styled.form`
  margin-bottom: 1rem;
`;

const StyledRadioLabel = styled.label`
  display: block;
  margin-bottom: 0.5rem;
`;

const THEMES = cssThemes.themes.reduce(
  (output, theme) => Object.assign({}, output, { [theme.name]: theme }),
  {}
);

registerBlockType('colbycomms/themed-block', {
  title: 'Themed Block',

  category: 'common',

  attributes: {
    themeName: {
      type: 'string',
    },
    width: {
      type: 'string',
    },
  },

  edit({ attributes, setAttributes, isSelected }) {
    console.log(attributes);
    let { themeName, width } = attributes;
    themeName = themeName || THEMES[cssThemes.defaultTheme].name;
    width = width || '';

    const controls = isSelected && (
      <InspectorControls key="controls">
        <h3>Theme</h3>
        <StyledForm
          onChange={event => {
            setAttributes({ themeName: event.target.value });
          }}
        >
          {cssThemes.themes.map(
            theme =>
              theme['background-color'] ? (
                <StyledRadioLabel key={theme.name}>
                  <input
                    type="radio"
                    value={theme.name}
                    checked={themeName === theme.name}
                  />
                  {theme.name.replace(/-/g, ' ')}
                </StyledRadioLabel>
              ) : null
          )}
        </StyledForm>
        <h3>Width</h3>
        <StyledForm
          onChange={event => {
            setAttributes({ width: event.target.value });
          }}
        >
          <StyledRadioLabel key="fluid">
            <input type="radio" value="fluid" checked={width === 'fluid'} />
            Full (will fill its container element)
          </StyledRadioLabel>
          <StyledRadioLabel key="xl">
            <input type="radio" value="xl" checked={width === 'xl'} />
            Extra large (1200px)
          </StyledRadioLabel>
          <StyledRadioLabel key="">
            <input type="radio" value="" checked={width === ''} />
            Large (1140px)
          </StyledRadioLabel>
          <StyledRadioLabel key="lg">
            <input type="radio" value="lg" checked={width === 'lg'} />
            Medium (900px)
          </StyledRadioLabel>
          <StyledRadioLabel key="md">
            <input type="radio" value="md" checked={width === 'md'} />
            Small (768px)
          </StyledRadioLabel>
          <StyledRadioLabel key="sm">
            <input type="radio" value="sm" checked={width === 'sm'} />
            Extra small (568px)
          </StyledRadioLabel>
        </StyledForm>
      </InspectorControls>
    );

    return [
      controls,
      <div
        className={`themed-block ${themeName} container${
          width ? `-${width}` : ''
        }`}
      >
        <InnerBlocks layouts={{ 'inner-block': {} }} />
      </div>,
    ];
  },

  save({ attributes }) {
    let { themeName, width } = attributes;
    themeName = themeName || THEMES[cssThemes.defaultTheme].name;
    width = width || '';

    return (
      <div
        className={`themed-block ${themeName} container${
          width ? `-${width}` : ''
        }`}
      >
        <InnerBlocks.Content />
      </div>
    );
  },
});
