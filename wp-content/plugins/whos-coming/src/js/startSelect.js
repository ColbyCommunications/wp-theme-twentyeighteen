const addOptionsElements = ({ options, select }) => {
  options.forEach(option => {
    const optionElement = document.createElement('OPTION');
    optionElement.setAttribute('value', option);
    optionElement.innerHTML = option;
    select.append(optionElement);
  });
};

const getOptions = ({ rows, selectField }) =>
  [...rows].reduce((options, row) => {
    if (options.indexOf(row.data[selectField]) === -1) {
      options.push(row.data[selectField]);
    }

    return options;
  }, []);

const handleSelectChange = ({ select, onChange }) => {
  const activeOption =
    select.value && select.value.indexOf('--') === -1 ? select.value : null;
  onChange(activeOption);
};

export const startSelect = ({ selectField, select, onChange, rows }) => {
  const options = getOptions({ rows, selectField });
  options.sort();

  addOptionsElements({ options, select });

  select.addEventListener('change', () => {
    handleSelectChange({ select, onChange });
  });
};
