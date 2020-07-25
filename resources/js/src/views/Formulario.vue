<template>
    <div>
        <h4>Formulario</h4>
        <el-form ref="form" :model="form" label-position="top">
            <el-row :gutter="20">

                <el-col :span="16">
                    <vx-card class="mt-4" >

                        <el-row :gutter="20">
                            <el-col :span="6">
                                <el-form-item label="Fecha Documento">
                                    <el-date-picker 
                                        type="date" 
                                        v-model="form.fecha_documento" 
                                        :value="form.fecha_documento" 
                                        format="dd-MM-yyyy"
                                        style="width: 100%;"
                                        >
                                    </el-date-picker>
                                </el-form-item>
                            </el-col>

                            <el-col :span="12">
                                <el-form-item label="Proveedor">
                                    <el-input v-model="form.proveedor" ></el-input>
                                </el-form-item>
                            </el-col>

                        </el-row>

                        <el-row :gutter="20">
                            <el-col :span="6">
                                <el-form-item label="Tipo Documento">
                                    <el-select v-model="form.tipo_documento" placeholder="Por favor seleccione">
                                        <el-option
                                            v-for="item in options"
                                            :key="item.value"
                                            :label="item.label"
                                            :value="item.value">
                                        </el-option>
                                    </el-select>
                                </el-form-item>
                            </el-col>

                            <el-col :span="6">
                                <el-form-item label="N° Documento">
                                    <el-input v-model="form.numero_documento" ></el-input>
                                </el-form-item>
                            </el-col>

                            <el-col :span="6">
                                <el-form-item label="Orden de Compra">
                                    <el-input v-model="form.orden_de_compra" ></el-input>
                                </el-form-item>
                            </el-col>

                            <el-col :span="6">
                                <el-form-item label="Monto Total">
                                    <el-input v-model="form.monto_total" placeholder="IVA incluido" ></el-input>
                                </el-form-item>
                            </el-col>

                        </el-row>

                        <el-row >
                            <el-col :span="24">
                                <el-form-item label="Observación">
                                    <el-input type="textarea" v-model="form.observacion"></el-input>
                                </el-form-item>
                            </el-col>
                        </el-row>

                    </vx-card>
                </el-col>

                <el-col :span="8">
                    <vx-card class="mt-4" >

                        <el-row >
                            <el-col :span="12">
                                <el-form-item label="Fecha Recepción">
                                    <el-date-picker 
                                        type="date" 
                                        v-model="form.fecha_recepcion" 
                                        :value="form.fecha_recepcion" 
                                        format="dd-MM-yyyy"
                                        style="width: 100%;"
                                        >
                                    </el-date-picker>
                                </el-form-item>
                            </el-col>
                        </el-row>

                        <el-row >
                            <el-col :span="24">
                                <el-form-item label="Centro de Salud">
                                    <el-select v-model="form.centro_salud" placeholder="Por favor seleccione" style="width: 100%;">
                                        <el-option
                                            v-for="item in options"
                                            :key="item.value"
                                            :label="item.label"
                                            :value="item.value" >
                                        </el-option>
                                    </el-select>
                                </el-form-item>
                            </el-col>
                        </el-row>

                        <el-row >
                            <el-col :span="24">
                                <el-form-item label="Responsable Recepción">
                                    <el-select v-model="form.responsable_recepcion" placeholder="Por favor seleccione" style="width: 100%;" >
                                        <el-option
                                            v-for="item in options"
                                            :key="item.value"
                                            :label="item.label"
                                            :value="item.value">
                                        </el-option>
                                    </el-select>
                                </el-form-item>
                            </el-col>
                        </el-row>

                    </vx-card>
                </el-col>

            </el-row>
        </el-form>

        <!-- <div class="vx-col" vs-w="8">
            <vx-card class="mt-2" >

                <vs-row>
                    <vs-col vs-w="2" class="p-4 sm:p-2">

                        <el-select v-model="form.tipo_documento" placeholder="Tipo Documento">
                            <el-option
                                
                                name="Tipo Documento"
                                v-validate="'required'"

                                v-for="item in options"
                                :key="item.value"
                                :value="item.value">
                            </el-option>
                        </el-select>
                        <span class="text-danger text-sm" v-show="errors.has('Tipo Documento')">{{ errors.first('Tipo Documento') }}</span>

                    </vs-col>

                    <vs-col vs-w="2" class="p-4 sm:p-2">
                        <vs-input 
                            class="w-full" 
                            label="N° Documento" 
                            name="N° Documento"
                            v-model="form.numero_documento" 
                            v-validate="'required'" />
                            <span class="text-danger text-sm" v-show="errors.has('N° Documento')">{{ errors.first('N° Documento') }}</span>
                    </vs-col>

                    <vs-col vs-w="2" class="p-4 sm:p-2">
                        <vs-input 
                            class="w-full" 
                            label="Orden de Compra" 
                            name="Orden de Compra"
                            v-model="form.orden_de_compra" 
                            v-validate="'required'" />
                            <span class="text-danger text-sm" v-show="errors.has('Orden de Compra')">{{ errors.first('Orden de Compra') }}</span>
                    </vs-col>

                    <vs-col  vs-w="2" class="p-4 sm:p-2">
                        <vs-input 
                            class="w-full" 
                            label="Monto Total" 
                            name="Monto Total"
                            icon-pack="feather" icon="icon-dollar-sign" icon-no-border 
                            placeholder="IVA incluido"
                            v-model="form.monto_total" 
                            v-validate="'required'" />
                            <span class="text-danger text-sm" v-show="errors.has('Monto Total')">{{ errors.first('Monto Total') }}</span>
                    </vs-col>

                    <vs-col vs-type="flex" vs-justify="center" vs-align="center" vs-w="2" class="p-4 sm:p-2">
                        <vs-input 
                            class="w-full" 
                            label="Fecha Documento"
                            name="Fecha Documento" 
                            type="date"
                            v-model="form.fecha_documento" 
                            :value="form.fecha_documento"
                            v-validate="'required'" />
                            <span class="text-danger text-sm" v-show="errors.has('Fecha Documento')">{{ errors.first('Fecha Documento') }}</span>
                    </vs-col>

                </vs-row>

                <vs-row>

                    <vs-col vs-w="2" class="p-4 sm:p-2">
                        <vs-input 
                            class="w-full"
                            label="Fecha de Recepción" 
                            type="date"
                            v-model="form.fecha_recepcion" 
                            :value="form.fecha_recepcion" 
                            v-validate="'required'" />
                            <span class="text-danger text-sm" v-show="errors.has('Fecha de Recepción')">{{ errors.first('Fecha de Recepción') }}</span>
                    </vs-col>

                    <vs-col vs-w="3" class="p-4 sm:p-2">
                        <vs-input 
                            class="w-full" 
                            label="Centro de Salud"
                            name="Centro de Salud"
                            v-model="form.centro_salud" 
                            v-validate="'required'" />
                            <span class="text-danger text-sm" v-show="errors.has('Centro de Salud')">{{ errors.first('Centro de Salud') }}</span>
                    </vs-col>

                    <vs-col vs-w="3" class="p-4 sm:p-2">
                        <vs-input 
                            class="w-full" 
                            label="Responsable de Recepción"
                            name="Responsable de Recepción" 
                            v-model="form.responsable_recepcion" 
                            v-validate="'required'" />
                            <span class="text-danger text-sm" v-show="errors.has('Responsable de Recepción')">{{ errors.first('Responsable de Recepción') }}</span>
                    </vs-col>

                </vs-row>

                <vs-alert active="true" color="success" style="text-align: justify;" class="mb-3">
                    Adjuntar recepción original, que incluya al menos una identifiación del responsable de recepción
                </vs-alert>

                <vs-row>
                    <vs-col vs-w="12" class="p-4 sm:p-2">
                        <vs-textarea 
                            counter="250" 
                            label="Observación" 
                            maxlength="250" 
                            name="Observación" 
                            v-validate="'max:250'"
                            v-model="form.observacion" />
                        <span class="text-danger text-sm" v-show="errors.has('Observación')">{{ errors.first('Observación') }}</span>
                    </vs-col>
                </vs-row>


            </vx-card>

            <vs-button type="filled" @click.prevent="submitForm" class="mt-5 block">Guardar</vs-button>
        </div>

        <div class="vx-col w-full mb-base">
            <vx-card class="mt-2">

                <vs-row>
                    <vs-col vs-w="2" class="p-4 sm:p-2">

                        <el-select v-model="form.tipo_documento" placeholder="Tipo Documento">
                            <el-option
                                
                                name="Tipo Documento"
                                v-validate="'required'"

                                v-for="item in options"
                                :key="item.value"
                                :value="item.value">
                            </el-option>
                        </el-select>
                        <span class="text-danger text-sm" v-show="errors.has('Tipo Documento')">{{ errors.first('Tipo Documento') }}</span>

                    </vs-col>

                    <vs-col vs-w="2" class="p-4 sm:p-2">
                        <vs-input 
                            class="w-full" 
                            label="N° Documento" 
                            name="N° Documento"
                            v-model="form.numero_documento" 
                            v-validate="'required'" />
                            <span class="text-danger text-sm" v-show="errors.has('N° Documento')">{{ errors.first('N° Documento') }}</span>
                    </vs-col>

                    <vs-col vs-w="2" class="p-4 sm:p-2">
                        <vs-input 
                            class="w-full" 
                            label="Orden de Compra" 
                            name="Orden de Compra"
                            v-model="form.orden_de_compra" 
                            v-validate="'required'" />
                            <span class="text-danger text-sm" v-show="errors.has('Orden de Compra')">{{ errors.first('Orden de Compra') }}</span>
                    </vs-col>

                    <vs-col  vs-w="2" class="p-4 sm:p-2">
                        <vs-input 
                            class="w-full" 
                            label="Monto Total" 
                            name="Monto Total"
                            icon-pack="feather" icon="icon-dollar-sign" icon-no-border 
                            placeholder="IVA incluido"
                            v-model="form.monto_total" 
                            v-validate="'required'" />
                            <span class="text-danger text-sm" v-show="errors.has('Monto Total')">{{ errors.first('Monto Total') }}</span>
                    </vs-col>

                    <vs-col vs-type="flex" vs-justify="center" vs-align="center" vs-w="2" class="p-4 sm:p-2">
                        <vs-input 
                            class="w-full" 
                            label="Fecha Documento"
                            name="Fecha Documento" 
                            type="date"
                            v-model="form.fecha_documento" 
                            :value="form.fecha_documento"
                            v-validate="'required'" />
                            <span class="text-danger text-sm" v-show="errors.has('Fecha Documento')">{{ errors.first('Fecha Documento') }}</span>
                    </vs-col>

                </vs-row>

                <vs-row>

                    <vs-col vs-w="2" class="p-4 sm:p-2">
                        <vs-input 
                            class="w-full"
                            label="Fecha de Recepción" 
                            type="date"
                            v-model="form.fecha_recepcion" 
                            :value="form.fecha_recepcion" 
                            v-validate="'required'" />
                            <span class="text-danger text-sm" v-show="errors.has('Fecha de Recepción')">{{ errors.first('Fecha de Recepción') }}</span>
                    </vs-col>

                    <vs-col vs-w="3" class="p-4 sm:p-2">
                        <vs-input 
                            class="w-full" 
                            label="Centro de Salud"
                            name="Centro de Salud"
                            v-model="form.centro_salud" 
                            v-validate="'required'" />
                            <span class="text-danger text-sm" v-show="errors.has('Centro de Salud')">{{ errors.first('Centro de Salud') }}</span>
                    </vs-col>

                    <vs-col vs-w="3" class="p-4 sm:p-2">
                        <vs-input 
                            class="w-full" 
                            label="Responsable de Recepción"
                            name="Responsable de Recepción" 
                            v-model="form.responsable_recepcion" 
                            v-validate="'required'" />
                            <span class="text-danger text-sm" v-show="errors.has('Responsable de Recepción')">{{ errors.first('Responsable de Recepción') }}</span>
                    </vs-col>

                </vs-row>

                <vs-alert active="true" color="success" style="text-align: justify;" class="mb-3">
                    Adjuntar recepción original, que incluya al menos una identifiación del responsable de recepción
                </vs-alert>

                <vs-row>
                    <vs-col vs-w="12" class="p-4 sm:p-2">
                        <vs-textarea 
                            counter="250" 
                            label="Observación" 
                            maxlength="250" 
                            name="Observación" 
                            v-validate="'max:250'"
                            v-model="form.observacion" />
                        <span class="text-danger text-sm" v-show="errors.has('Observación')">{{ errors.first('Observación') }}</span>
                    </vs-col>
                </vs-row>


            </vx-card>

            <vs-button type="filled" @click.prevent="submitForm" class="mt-5 block">Guardar</vs-button>
        </div> -->
    </div>
</template>

<script>

export default {
  data () {
    return {
        form: {
            tipo_documento: '',
            numero_documento: '',
            fecha_documento: new Date().toISOString().slice(0,10),
            fecha_recepcion: '',
            orden_de_compra: '',
            monto_total: '',
            proveedor: '',
        },
        options: [{
          value: '1', // id
          label: 'Guía de Despacho'
        }, {
          value: '2',
          label: 'Cedible'
        }]
    }
  },
  methods: {
    submitForm() {

        this.$validator.validateAll().then(result => {
        if(result) {
          // if form have no errors
          alert("formulario enviado!");
        }else{
          // form have errors
        }
      });
    }
  },
  mounted() {
      
    console.log('fecha');
    console.log(this.form.fecha_documento);
    console.log( new Date().toISOString().slice(0,10) );
      
  }
}

</script>