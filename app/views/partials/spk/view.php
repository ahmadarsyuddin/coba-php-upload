    <template id="spkView">
        <section class="page-component">
            <div v-if="showheader" class="bg-light p-3 mb-3">
                <div class="container">
                    <div class="row ">
                        <div  class="col-12 comp-grid" :class="setGridSize">
                            <h3 class="record-title">View  Spk</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div  class="pb-2 mb-3 border-bottom">
                <div class="container">
                    <div class="row ">
                        <div  class="col-md-12 comp-grid" :class="setGridSize">
                            <div  class=" animated fadeIn">
                                <div v-show="!loading">
                                    <div ref="datatable" id="datatable">
                                        <table class="table table-hover table-borderless table-striped">
                                            <!-- Table Body Start -->
                                            <tbody>
                                                <tr>
                                                    <th class="title"> Id Disposisi :</th>
                                                    <td class="value"><router-link :to="'/spk/view/' +  data.id_disposisi">{{data.id_disposisi}}</router-link></td>
                                                </tr>
                                                <tr>
                                                    <th class="title"> Id Surat :</th>
                                                    <td class="value"> {{ data.id_surat }} </td>
                                                </tr>
                                                <tr>
                                                    <th class="title"> Status :</th>
                                                    <td class="value"> {{ data.status }} </td>
                                                </tr>
                                                <tr>
                                                    <th class="title"> Id User :</th>
                                                    <td class="value"> {{ data.id_user }} </td>
                                                </tr>
                                                <tr>
                                                    <th class="title"> Catatan :</th>
                                                    <td class="value"> {{ data.catatan }} </td>
                                                </tr>
                                            </tbody>
                                            <!-- Table Body End -->
                                        </table>
                                    </div>
                                    <div v-if="editbutton || deletebutton || exportbutton" class="py-3">
                                        <span >
                                            <router-link class="btn btn-sm btn-info has-tooltip" v-if="editbutton"  :to="'/spk/edit/'  + data.id_disposisi">
                                            <i class="fa fa-edit"></i> 
                                            </router-link>
                                            <button @click="deleteRecord" class="btn btn-sm btn-danger" v-if="deletebutton" :to="'/spk/delete/' + data.id_disposisi">
                                            <i class="fa fa-times"></i> </button>
                                        </span>
                                        <button @click="exportRecord" class="btn btn-sm btn-primary" v-if="exportbutton">
                                            <i class="fa fa-save"></i> 
                                        </button>
                                    </div>
                                </div>
                                <div v-show="loading" class="load-indicator static-center">
                                    <span class="animator">
                                        <clip-loader :loading="loading" color="gray" size="20px">
                                        </clip-loader>
                                    </span>
                                    <h4 style="color:gray" class="loading-text"></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </template>
    <script>
	var SpkViewComponent = Vue.component('spkView', {
		template : '#spkView',
		mixins: [ViewPageMixin],
		props: {
			pagename: {
				type : String,
				default : 'spk',
			},
			routename : {
				type : String,
				default : 'spkview',
			},
			apipath: {
				type : String,
				default : 'spk/view',
			},
		},
		data: function() {
			return {
				data : {
					default :{
						id_disposisi: '',id_surat: '',status: '',id_user: '',catatan: '',
					},
				},
			}
		},
		computed: {
			pageTitle: function(){
				return 'View  Spk';
			},
		},
		methods :{
			resetData : function(){
				this.data = {
					id_disposisi: '',id_surat: '',status: '',id_user: '',catatan: '',
				}
			},
		},
	});
	</script>
