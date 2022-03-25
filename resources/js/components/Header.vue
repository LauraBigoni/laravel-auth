<template>
	<div>
		<h1 class="display-1 pb-5" v-text="title"></h1>
		<h2 v-text="description"></h2>
	</div>
</template>

<script>
export default {
	name: "Header",
	props: ["title", "description"],
};
</script>
