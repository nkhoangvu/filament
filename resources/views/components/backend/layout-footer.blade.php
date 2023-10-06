  <footer class="main-footer no-print">
      <div class="float-left d-none d-sm-inline-block">
        <b>Trang thông tin & Gia phả họ Nguyễn Khoa (ver. 1.1)</b> &nbsp;
      </div>
    <strong>Copyright &copy; 2022 <a href="https://asahi.com.vn">Asahi Investment & Technology JSC.</a></strong> All rights reserved.
  </footer>
   
  <script>
    var toggleSwitch = document.querySelector('.theme-switch input[type="checkbox"]');
    var currentTheme = localStorage.getItem('theme');
    var mainHeader = document.querySelector('.main-header');

    if (currentTheme) {
      if (currentTheme === 'dark') {
        if (!document.body.classList.contains('dark-mode')) {
          document.body.classList.add("dark-mode");
        }
        if (mainHeader.classList.contains('navbar-light')) {
          mainHeader.classList.add('navbar-dark');
          mainHeader.classList.remove('navbar-light');
        }
        toggleSwitch.checked = true;
      }
    }

    function switchTheme(e) {
      if (e.target.checked) {
        if (!document.body.classList.contains('dark-mode')) {
          document.body.classList.add("dark-mode");
        }
        if (mainHeader.classList.contains('navbar-light')) {
          mainHeader.classList.add('navbar-dark');
          mainHeader.classList.remove('navbar-light');
        }
        localStorage.setItem('theme', 'dark');
      } else {
        if (document.body.classList.contains('dark-mode')) {
          document.body.classList.remove("dark-mode");
        }
        if (mainHeader.classList.contains('navbar-dark')) {
          mainHeader.classList.add('navbar-light');
          mainHeader.classList.remove('navbar-dark');
        }
        localStorage.setItem('theme', 'light');
      }
    }
  
    toggleSwitch.addEventListener('change', switchTheme, false);
  </script>
