<template>
    <div>
        <h4>Formulario</h4>

        <div class="vx-col w-full mb-base">
            <vx-card class="mt-2">

                <vs-row>
                    <vs-col vs-w="2" class="p-4 sm:p-2">
                        <vs-input 
                            class="w-full" 
                            label="Tipo Documento"
                            name="Tipo Documento"
                            v-model="form.tipo_documento"
                            v-validate="'required'" />
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
<!-- 
            <vx-card class="mt-2">
                <vs-alert active="true" color="success" style="text-align: justify;" class="mb-3">
                    LA PRESENTE SOLICITUD DE SERVICIO, DEBE SER TRAMITADA ANTES DEL INICIO DE LA PRESTACION
                </vs-alert>

                <vs-row>
                    <vs-col vs-w="12" class="p-4 sm:p-2">
                        <vs-textarea counter="250" label="Justificación de la Contratación" maxlength="250" minlength="100"
                                     name="Justificación" v-validate="'required|min:100|max:250'"
                                         v-model="form.justificacion_contratacion" />
                        <span class="text-danger text-sm" v-show="errors.has('Justificación')">{{ errors.first('Justificación') }}</span>
                    </vs-col>
                </vs-row>

                <vs-row>
                    <vs-col vs-w="4" class="p-4 sm:p-2">
                        <vs-input class="w-full" label-placeholder="Nombre" name="Nombre" 
                                    v-model="form.nombre" v-validate="'required'" />
                        <span class="text-danger text-sm" v-show="errors.has('Nombre')">{{ errors.first('Nombre') }}</span>
                    </vs-col>
                    
                    <vs-col vs-w="2" class="p-4 sm:p-2">
                        <vs-input class="w-full" label-placeholder="Rut" name="Rut" 
                                    v-model="form.rut" v-validate="'required'" />
                        <span class="text-danger text-sm" v-show="errors.has('Rut')">{{ errors.first('Rut') }}</span>
                    </vs-col>

                    <vs-col vs-w="2" class="p-4 sm:p-2">
                        <vs-input class="w-full" label-placeholder="Nacionalidad" name="Nacionalidad" 
                                    v-model="form.nacionalidad" v-validate="'required'" />
                        <span class="text-danger text-sm" v-show="errors.has('Nacionalidad')">{{ errors.first('Nacionalidad') }}</span>
                    </vs-col>
                </vs-row>

                <vs-row>
                    <vs-col vs-w="3" class="p-4 sm:p-2">
                        <vs-input class="w-full" label-placeholder="Profesión" name="Profesión" 
                                    v-model="form.profesion" v-validate="'required'" />
                        <span class="text-danger text-sm" v-show="errors.has('Profesión')">{{ errors.first('Profesión') }}</span>
                    </vs-col>
                    
                    <vs-col vs-w="3" class="p-4 sm:p-2">
                        <vs-input class="w-full" label-placeholder="Especialidad" name="Especialidad" 
                                    v-model="form.especialidad" v-validate="'required'" />
                        <span class="text-danger text-sm" v-show="errors.has('Especialidad')">{{ errors.first('Especialidad') }}</span>
                    </vs-col>

                    <vs-col vs-w="3" class="p-4 sm:p-2">
                        <vs-input class="w-full" label-placeholder="N° Registro Superintendencia de Salud" name="N° Registro Superintendencia"
                                    v-model="form.numero_registro_superintendencia_de_salud" v-validate="'required'" />
                        <span class="text-danger text-sm" v-show="errors.has('N° Registro Superintendencia')">{{ errors.first('N° Registro Superintendencia') }}</span>
                    </vs-col>
                </vs-row>

                <vs-row>
                    <vs-col vs-w="4" class="p-4 sm:p-2">
                        <vs-input class="w-full" label-placeholder="Domicilio" name="Domicilio" 
                                    v-model="form.domicilio" v-validate="'required'" />
                        <span class="text-danger text-sm" v-show="errors.has('Domicilio')">{{ errors.first('Domicilio') }}</span>
                    </vs-col>
                    
                    <vs-col vs-w="3" class="p-4 sm:p-2">
                        <vs-input class="w-full" label-placeholder="Comuna" name="Comuna" 
                                    v-model="form.comuna" v-validate="'required'" />
                        <span class="text-danger text-sm" v-show="errors.has('Comuna')">{{ errors.first('Comuna') }}</span>
                    </vs-col>

                    <vs-col vs-w="3" class="p-4 sm:p-2">
                        <vs-input class="w-full" label-placeholder="Email" name="Email" 
                                    v-model="form.email" v-validate="'required|email'" />
                        <span class="text-danger text-sm" v-show="errors.has('Email')">{{ errors.first('Email') }}</span>
                    </vs-col>
                </vs-row>

                <vs-row>
                    <vs-col vs-w="2" class="p-4 sm:p-2">
                        <vs-input class="w-full" label-placeholder="Fecha de inicio" name="Fecha de inicio" 
                                    v-model="form.fecha_inicio" v-validate="'required'" />
                        <span class="text-danger text-sm" v-show="errors.has('Fecha de inicio')">{{ errors.first('Fecha de inicio') }}</span>
                    </vs-col>

                    <vs-col vs-w="2" class="p-4 sm:p-2">
                        <vs-input class="w-full" label-placeholder="Vigencia en meses" name="Vigencia en meses" 
                                    v-model="form.vigencia_en_meses" v-validate="'required'" />
                        <span class="text-danger text-sm" v-show="errors.has('Vigencia en meses')">{{ errors.first('Vigencia en meses') }}</span>
                    </vs-col>

                    <vs-col vs-w="2" class="p-4 sm:p-2">
                        <vs-input class="w-full" label-placeholder="N° Horas al mes" name="N° Horas al mes" 
                                    v-model="form.numero_horas_al_mes" v-validate="'required'" />
                        <span class="text-danger text-sm" v-show="errors.has('N° Horas al mes')">{{ errors.first('N° Horas al mes') }}</span>
                    </vs-col>

                    <vs-col vs-w="2" class="p-4 sm:p-2">
                        <vs-input class="w-full" label-placeholder="N° Turnos al mes" name="N° Turnos al mes" 
                                    v-model="form.numero_turnos_al_mes" />
                    </vs-col>

                    <vs-col vs-w="2" class="p-4 sm:p-2">
                        <vs-input class="w-full" label-placeholder="N° Horas y/o Turnos extras" name="N° Horas y/o Turnos extras"
                                    v-model="form.numero_horas_o_turnos_extras" />
                    </vs-col>
                </vs-row>

                <vs-row>
                    <vs-col vs-w="3" class="p-4 sm:p-2">
                        <vs-input class="w-full" icon-pack="feather" icon="icon-dollar-sign" icon-no-border 
                                    label-placeholder="Valor Hora/Prestación" name="Valor Hora/Prestación" 
                                    v-model="form.valor_hora_prestacion" v-validate="'required'" />
                        <span class="text-danger text-sm" v-show="errors.has('N° Horas al mes')">{{ errors.first('N° Horas al mes') }}</span>
                    </vs-col>

                    <vs-col vs-w="3" class="p-4 sm:p-2">
                        <vs-input class="w-full" icon-pack="feather" icon="icon-dollar-sign" icon-no-border 
                                    label-placeholder="Monto Máximo Contratación" name="Monto Máximo Contratación" 
                                    v-model="form.monto_maximo_contratacion" v-validate="'required'" />
                        <span class="text-danger text-sm" v-show="errors.has('Monto Máximo Contratación')">{{ errors.first('Monto Máximo Contratación') }}</span>
                    </vs-col>
                </vs-row>

            </vx-card>

            <vx-card class="mt-2" >
                <vs-alert active="true" color="warning" style="text-align: justify;" class="mb-3">
                    SOLICITA ADMINISTADOR DEL CONTRATO Y EN RAZÓN DE LA CONFIANZA Y SEGURIDAD QUE SE DERIVAN DE SU EXPERIENCIA COMPROBADA
                </vs-alert>

                <vs-row>
                    <vs-col vs-type="flex" vs-justify="center" vs-align="center" vs-w="3" class="p-4 sm:p-2">
                        <vs-input class="w-full" label-placeholder="Cargo" v-model="form.cargo" />
                    </vs-col>

                    <vs-col vs-type="flex" vs-justify="center" vs-align="center" vs-w="3" class="p-4 sm:p-2">
                        <vs-input class="w-full" label-placeholder="Correo" v-model="form.correo" />
                    </vs-col>

                    <vs-col vs-type="flex" vs-justify="center" vs-align="center" vs-w="3" class="p-4 sm:p-2">
                        <vs-input class="w-full" label-placeholder="Anexos" v-model="form.anexos" />
                    </vs-col>
                </vs-row>
            </vx-card>

            <vx-card class="mt-2" >
                <vs-alert active="true" color="warning" style="text-align: justify;" class="mb-3">
                    AUTORIZAN DIRECTIVOS DEL HOSPITAL
                </vs-alert>

                <vs-row>
                    <vs-col vs-type="flex" vs-justify="center" vs-align="center" vs-w="3" class="p-4 sm:p-2">
                        <vs-input class="w-full" label-placeholder="Nombre"  />
                    </vs-col>

                    <vs-col vs-type="flex" vs-justify="center" vs-align="center" vs-w="3" class="p-4 sm:p-2">
                        <vs-input class="w-full" label-placeholder="Fecha Autoriza" />
                    </vs-col>

                    <vs-col vs-type="flex" vs-justify="center" vs-align="center" vs-w="3" class="p-4 sm:p-2">
                        <vs-input class="w-full" label-placeholder="Sub Dirección" />
                    </vs-col>
                </vs-row>
                

                <vs-row>
                    <vs-col vs-type="flex" vs-justify="center" vs-align="center" vs-w="3" class="p-4 sm:p-2">
                        <vs-input class="w-full" label-placeholder="Nombre"  />
                    </vs-col>

                    <vs-col vs-type="flex" vs-justify="center" vs-align="center" vs-w="3" class="p-4 sm:p-2">
                        <vs-input class="w-full" label-placeholder="Fecha Autoriza" />
                    </vs-col>

                    <vs-col vs-type="flex" vs-justify="center" vs-align="center" vs-w="3" class="p-4 sm:p-2">
                        <vs-input class="w-full" label-placeholder="Sub Dirección" value="Administrativa" />
                    </vs-col>
                </vs-row>
            </vx-card> -->

            <vs-button type="filled" @click.prevent="submitForm" class="mt-5 block">Guardar</vs-button>
        </div>
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
            fecha_recepcion: new Date().toISOString().slice(0,10),
            orden_de_compra: '',
            monto_total: '',

        }
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