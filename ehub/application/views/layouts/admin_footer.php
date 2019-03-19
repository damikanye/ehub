<footer class="app-footer">
    <div class="ml-auto">
        <span>Powered by</span>
        <a href="https://coreui.io">EHub</a>
    </div>
</footer>
<!-- CoreUI and necessary plugins-->
<script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/popper.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/pace.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/perfect-scrollbar.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/coreui.min.js"></script>
<!-- Plugins and scripts required by this view-->
<script src="<?php echo base_url(); ?>assets/js/Chart.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/custom-tooltips.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/datatables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/main.js"></script>
<script src="<?php echo base_url(); ?>assets/js/custom.js"></script>
<script>
    "use strict";

    !function() {
        var t = window.driftt = window.drift = window.driftt || [];
        if (!t.init) {
            if (t.invoked) return void (window.console && console.error && console.error("Drift snippet included twice."));
            t.invoked = !0, t.methods = [ "identify", "config", "track", "reset", "debug", "show", "ping", "page", "hide", "off", "on" ],
                t.factory = function(e) {
                    return function() {
                        var n = Array.prototype.slice.call(arguments);
                        return n.unshift(e), t.push(n), t;
                    };
                }, t.methods.forEach(function(e) {
                t[e] = t.factory(e);
            }), t.load = function(t) {
                var e = 3e5, n = Math.ceil(new Date() / e) * e, o = document.createElement("script");
                o.type = "text/javascript", o.async = !0, o.crossorigin = "anonymous", o.src = "https://js.driftt.com/include/" + n + "/" + t + ".js";
                var i = document.getElementsByTagName("script")[0];
                i.parentNode.insertBefore(o, i);
            };
        }
    }();
    drift.SNIPPET_VERSION = '0.3.1';
    drift.load('skfxhazanxzr');
</script>
<!-- End of Async Drift Code -->
</body>
</html>
