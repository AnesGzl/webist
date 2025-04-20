document.addEventListener("DOMContentLoaded", () => {
    const notifToggle = document.getElementById('notifToggle');
    const notifBox = document.getElementById('notifBox');
    const closeNotif = document.getElementById('closeNotif');

    notifToggle.addEventListener('click', function (e) {
      e.preventDefault();
      notifBox.style.display = notifBox.style.display === 'block' ? 'none' : 'block';
    });

    closeNotif.addEventListener('click', function (e) {
      e.preventDefault();
      notifBox.style.display = 'none';
    });

    window.addEventListener('click', function (e) {
      if (!notifBox.contains(e.target) && !notifToggle.contains(e.target)) {
        notifBox.style.display = 'none';
      }
    });
  });
 