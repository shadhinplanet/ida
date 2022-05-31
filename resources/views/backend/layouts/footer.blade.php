

    <script>
        $(document).ready(function() {
            $("#toggle-btn").on("click", function() {
                $("#sidebar").toggleClass("sidebarClose");
                $(".mainContentArea").toggleClass("fullWidthContent");
            });

            $("#downArrow").on("click", function() {
                $("#headerDropdown").slideToggle(400);
            });

            $("#clientName").hide();
            $("#clientSelect").hide();

            $("#newClient").on("click", function() {
                $("#memberInput").hide();
                $("#businessTypeArea").hide();
                $("#clientName").show();
            });

            $("#oldClient").on("click", function() {
                $("#memberInput").hide();
                $("#businessTypeArea").hide();
                $("#clientName").show();
            });

            $("#member").on("click", function() {
                $("#memberInput").show();
                $("#businessTypeArea").show();
                $("#clientName").hide();
            });

            $("#formClear").click(function() {
                $("#memberForm:not('#clientType')").trigger("reset");
                $("#address").val("Enter your address here...");
            });
        });

        function previewFile(input) {
            var file = $("input[type=file]").get(0).files[0];
            if (file) {
                var reader = new FileReader();

                reader.onload = function() {
                    $("#previewImg").attr("src", reader.result);
                };

                reader.readAsDataURL(file);
            }
        }
    </script>
</body>

</html>
