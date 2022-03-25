<template>
	<div>
		<h1 v-text="title">BOOLPRESS</h1>
		<h2 v-text="description">Sito in costruzione</h2>
	</div>
</template>

<script>
export default {
	name: "Header",
	props: ["title", "description"],
};
</script>
