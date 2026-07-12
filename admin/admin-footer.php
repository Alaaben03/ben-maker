        </div>
    </div>
</div>
<script>
(function () {
    var root = document.documentElement;
    var tt = document.getElementById('theme-toggle');
    if (tt) tt.addEventListener('click', function () {
        var next = root.getAttribute('data-theme') === 'light' ? 'dark' : 'light';
        root.setAttribute('data-theme', next);
        try { localStorage.setItem('theme', next); } catch (e) {}
    });
    var st = document.getElementById('sidebar-toggle');
    var sb = document.getElementById('sidebar');
    if (st && sb) st.addEventListener('click', function () { sb.classList.toggle('open'); });
})();
</script>
</body>
</html>
