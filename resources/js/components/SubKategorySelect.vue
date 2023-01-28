<template>
        <div>Kategory</div>
        <select v-model="selectedCompanyId" @change="fetchBranches">
            <option value="" disabled>Select your kategory...</option>
            <option v-for="kategory in categories" :value="kategory.id">{{ kategory.name }}</option>
        </select>
        <div>
        <div v-if="loading" class="loading">Loading...</div>
        <div v-if="selectedCompanyId && !loading">Sub Kategory </div>
        <select v-if="selectedCompanyId && !loading" v-model="selectedBranchId" @change="emitSelectedBranchId">
            <option v-for="branch in branches" :key="branch.id" :value="branch.id">{{ branch.name }}</option>
        </select>
       
    </div>
</template>

<script>
export default {
    props: ['categories'],
    data() {
        return {
            selectedCompanyId: null,
            selectedBranchId: null,
            branches: [],
            loading: false,
        }
    },
    // computed: {
    //     branches: function(){
    //         return this.categories.find(c => c.id === this.selectedCompanyId).branches
    //     },
    // },
    methods: {
        fetchBranches() {
            this.loading = true;
            axios.get(`/loadSub/${this.selectedCompanyId}`)
                .then(response => {
                    this.branches = response.data;
                    this.loading = false;
                });
        },
        emitSelectedBranchId() {
        console.log(this.$splade.emit('subkategory-selected', this.selectedBranchId));
    },
    },
    watch: {
        selectedCompanyId(newValue) {
            if (!this.categories.find(c => c.id === newValue)) {
                this.fetchBranches();
            }
        },
    },
};
</script>
