import "./bootstrap";

const modifieBtn = document.getElementById("modifie");

if (modifieBtn) {
    modifieBtn.addEventListener("click", () => {
        const inputs = document.querySelectorAll(".inputSec");

        inputs.forEach((input) => {
            if (input.name === "date_examen") {
                const date = new Date();
                date.setDate(date.getDate() + 1);
                const formattedDate = date.toISOString().split("T")[0];
                input.setAttribute("type", "date");
                input.setAttribute("min", formattedDate);
            } else if (input.name === "duree") {
                input.value = input.value.replace(" min", "");
                input.setAttribute("type", "number");
                input.setAttribute("min", "30");
                input.setAttribute("max", "150");
            } else if (input.name === "type_inp") {
                const mySelect = document.querySelector('select[name="type"]');
                input.classList.add("hidden");
                mySelect.classList.remove("hidden");
            }
            input.classList.remove(
                "text-sky-600",
                "focus:outline-0",
                "text-end"
            );
            input.classList.add(
                "outline-2",
                "rounded",
                "ml-2",
                "bg-gray-100",
                "text-gray-800",
                "text-start",
                "pl-2"
            );
            input.disabled = false;
            document.getElementById("save").classList.remove("hidden");
        });

        document.getElementById("btnContainer").classList.add("hidden");
    });
}
