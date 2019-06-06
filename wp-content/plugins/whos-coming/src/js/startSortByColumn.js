const addColumnClickListener = ({ column, onChange }) => {
  column.addEventListener('click', () => onChange(column));
};

export const startSortByColumn = ({ columns, onChange }) => {
  columns.forEach(column => addColumnClickListener({ column, onChange }));
};
