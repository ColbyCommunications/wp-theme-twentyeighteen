export const startSearch = ({ onChange, searchInput }) => {
  searchInput.addEventListener('keyup', event => {
    onChange(event.target.value);
  });

  searchInput.addEventListener('search', event => {
    if (!event.target.value.trim()) {
      onChange(null);
    }
  });
};
