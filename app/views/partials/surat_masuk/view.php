    <template id="surat_masukView">
        <section class="page-component">
            <div v-if="showheader" class="bg-light p-3 mb-3">
                <div class="container">
                    <div class="row ">
                        <div  class="col-12 comp-grid" :class="setGridSize">
                            <h3 class="record-title">View  Surat Masuk</h3>
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
                                                    <th class="title"> Id Surat :</th>
                                                    <td class="value"> {{ data.id_surat }} </td>
                                                </tr>
                                                <tr>
                                                    <th class="title"> Nomer Surat :</th>
                                                    <td class="value"> {{ data.nomer_surat }} </td>
                                                </tr>
                                                <tr>
                                                    <th class="title"> Tanggal Surat :</th>
                                                    <td class="value"> {{ data.tanggal_surat }} </td>
                                                </tr>
                                                <tr>
                                                    <th class="title"> Perihal Surat :</th>
                                                    <td class="value"> {{ data.perihal_surat }} </td>
                                                </tr>
                                                <tr>
                                                    <th class="title"> Tanggal Terima :</th>
                                                    <td class="value"> {{ data.tanggal_terima }} </td>
                                                </tr>
                                                <tr>
                                                    <th class="title"> File Surat :</th>
                                                    <td class="value"> {{ data.file_surat }} </td>
                                                </tr>
                                                <tr>
                                                    <th class="title"> Diterima Oleh :</th>
                                                    <td class="value"> {{ data.diterima_oleh }} </td>
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
                                            <router-link class="btn btn-sm btn-info has-tooltip" v-if="editbutton"  :to="'/surat_masuk/edit/'  + data.id_surat">
                                            <i class="fa fa-edit"></i> 
                                            </router-link>
                                            <button @click="deleteRecord" class="btn btn-sm btn-danger" v-if="deletebutton" :to="'/surat_masuk/delete/' + data.id_surat">
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
	var Surat_MasukViewComponent = Vue.component('surat_masukView', {
		template : '#surat_masukView',
		mixins: [ViewPageMixin],
		props: {
			pagename: {
				type : String,
				default : 'surat_masuk',
			},
			routename : {
				type : String,
				default : 'surat_masukview',
			},
			apipath: {
				type : String,
				default : 'surat_masuk/view',
			},
		},
		data: function() {
			return {
				data : {
					default :{
						id_surat: '',nomer_surat: '',tanggal_surat: '',perihal_surat: '',tanggal_terima: '',file_surat: '',diterima_oleh: '',catatan: '',
					},
				},
			}
		},
		computed: {
			pageTitle: function(){
				return 'View  Surat Masuk';
			},
		},
		methods :{
			resetData : function(){
				this.data = {
					id_surat: '',nomer_surat: '',tanggal_surat: '',perihal_surat: '',tanggal_terima: '',file_surat: '',diterima_oleh: '',catatan: '',
				}
			},
		},
	});
	</script>
