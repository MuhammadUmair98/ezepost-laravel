<template>
    <div class="logo-container">
        <svg
            class="logo-svg"
            viewBox="0 0 300 266"
            xmlns="http://www.w3.org/2000/svg"
        >
            <path
                d="M77.463 265c-19.497 0-35.318-15.405-35.318-34.39v-22.054C17.987 202.676 0 181.326 0 155.948V55.206C0 25.291 24.946 1 55.668 1h154.664C241.054 1 266 25.29 266 55.206v100.806c0 29.916-24.946 54.206-55.668 54.206H145.67c-2.823 0-5.383 1.407-6.827 3.58-10.7 17.067-24.158 31.897-39.98 43.915-6.236 4.794-13.654 7.287-21.4 7.287zM55.701 27.336c-15.771 0-28.65 12.465-28.65 27.87v100.806c0 15.342 12.813 27.87 28.65 27.87 7.49 0 13.536 5.881 13.536 13.168v33.624c0 4.922 4.272 7.99 8.214 7.99 1.709 0 3.286-.575 4.732-1.662 13.273-10.1 24.576-22.565 33.578-36.947 6.309-10.036 17.743-16.237 29.965-16.237h64.727c15.77 0 28.65-12.464 28.65-27.87V55.206c0-15.341-12.814-27.87-28.65-27.87H55.7z"
            />
        </svg>
        <div class="logo-text">EZEPOST</div>
    </div>
</template>

<script>
export default {};
</script>

<style>
.logo-container {
    display: flex;
    align-items: center;
}

.logo-svg {
    width: 40px; /* Adjust the size as needed */
    height: auto;
    fill: white;
    margin-right: 10px; /* Adjust the spacing between the logo and text */
}

.logo-text {
    font-size: 24px; /* Adjust the font size as needed */
    font-weight: bold;
    color: white;
}
</style>
