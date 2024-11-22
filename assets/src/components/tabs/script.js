const tabsComponents = document.querySelectorAll('.tabs');

tabsComponents.forEach((tabs) => {
   const links = tabs.querySelectorAll('.tabs__link');
   const panels = tabs.querySelectorAll('.tabs__panel');

   links.forEach((link) => {
      link.addEventListener('click', () => {
      const targetId = link.getAttribute('data-target');

      // Deactivate all links and panels
      links.forEach((l) => l.classList.remove('tabs__link--active'));
      panels.forEach((panel) => panel.classList.remove('tabs__panel--active'));

      // Activate the selected link and panel
      link.classList.add('tabs__link--active');
      tabs.querySelector(`#${targetId}`).classList.add('tabs__panel--active');
      });
   });
});