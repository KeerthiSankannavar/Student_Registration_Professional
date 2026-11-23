$(function () {
    const $form = $("#regForm");
    const $mobile = $("#mobile");
    const $dob = $("#dob");

    // Prevent selecting a future date of birth.
    if ($dob.length) {
        const today = new Date();
        const localDate = new Date(today.getTime() - today.getTimezoneOffset() * 60000)
            .toISOString().slice(0, 10);
        $dob.attr("max", localDate);
    }

    // Keep mobile input numeric and limit it to ten digits.
    $mobile.on("input", function () {
        this.value = this.value.replace(/\D/g, "").slice(0, 10);
    });

    $form.on("submit", function (event) {
        const name = $("#name").val().trim();
        const usn = $("#usn").val().trim();
        const email = $("#email").val().trim();
        const mobile = $mobile.val().trim();

        if (!name || !usn || !email || !mobile) {
            event.preventDefault();
            alert("Please complete all required fields.");
            return;
        }
        if (!/^[0-9]{10}$/.test(mobile)) {
            event.preventDefault();
            alert("Enter a valid 10-digit mobile number.");
            $mobile.trigger("focus");
            return;
        }
        if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
            event.preventDefault();
            alert("Enter a valid email address.");
            $("#email").trigger("focus");
        }
    });

    $form.on("reset", function () {
        window.setTimeout(function () {
            $form.find("input, textarea, select").removeClass("invalid");
        }, 0);
    });
});


    // Live completion meter: counts the required form fields as they are filled.
    const requiredFields = $form.find("input[required], select[required], textarea[required]")
        .filter(function () { return this.type !== "radio"; });
    const radioGroups = [...new Set($form.find('input[type="radio"][required]').map(function () { return this.name; }).get())];

    function updateCompletion() {
        let complete = 0;
        const total = requiredFields.length + radioGroups.length;
        requiredFields.each(function () {
            if (String($(this).val() || "").trim() !== "") complete++;
        });
        radioGroups.forEach(function (group) {
            if ($form.find('input[name="' + group + '"]:checked').length) complete++;
        });
        const percent = total ? Math.round((complete / total) * 100) : 0;
        $("#completionBar").css("width", percent + "%");
        $("#completionValue").text(percent + "%");
    }
    $form.on("input change", "input, textarea, select", updateCompletion);
    updateCompletion();

    // Gentle pointer-driven 3D tilt for the decorative campus emblem.
    const visual = document.getElementById("visual3d");
    if (visual && window.matchMedia("(hover: hover) and (pointer: fine)").matches &&
        !window.matchMedia("(prefers-reduced-motion: reduce)").matches) {
        visual.addEventListener("pointermove", function (event) {
            const bounds = visual.getBoundingClientRect();
            const x = (event.clientX - bounds.left) / bounds.width - 0.5;
            const y = (event.clientY - bounds.top) / bounds.height - 0.5;
            visual.style.transform = "perspective(900px) rotateY(" + (x * 5) +
                "deg) rotateX(" + (y * -5) + "deg)";
        });
        visual.addEventListener("pointerleave", function () {
            visual.style.transform = "perspective(900px) rotateY(0deg) rotateX(0deg)";
        });
    }
