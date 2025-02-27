// test.js

// function spinWords(string) {
// 	return string
// 		.split(" ")
// 		.map((word) =>
// 			word.length >= 5 ? word.split("").reverse().join("") : word
// 		)
// 		.join(" ");
// }

// function handleSubmit(event) {
// 	event.preventDefault(); // Prevent form submission

// 	let nameInput = document.getElementById("name").value; // Get text from Name field
// 	let transformedText = spinWords(nameInput); // Transform text

// 	let messageField = document.getElementById("message");
// 	messageField.value = transformedText; // Output transformed text into Message field
// }
// =============================================================================================================================

function likes(names) {
	// TODO
}
// =============================================================================================================================

// Run when the page is loaded
document.addEventListener("DOMContentLoaded", function () {
	document.getElementById("submit-btn").addEventListener("click", handleSubmit);
});
