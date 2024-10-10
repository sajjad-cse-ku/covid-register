import Layout from "@/layouts/MainLayout";
import ActionButton from '@/components/ActionButton';
import useForm from '@/hooks/useForm';
import ContainerBox from '@/layouts/ContainerBox';
import {
  Group,
  TextInput,
  Select,
} from '@mantine/core';
import { usePage } from '@inertiajs/react';
const Register = () => {
  const { centers } = usePage().props;
  const [form, submit, updateValue] = useForm('post', route('test'), {
    _method: 'post',
    name: '',
    center_id:'',
  });
  return (
    <>
      <ContainerBox>
        <form onSubmit={e => submit(e, { forceFormData: true })}>
          <Group grow>
            <Select
              label='Country'
              placeholder='Select country'
              mt='md'
              searchable={true}
              value={form.data.center_id?.toString()}
              onChange={value => updateValue('center_id', value)}
              data={centers.map(center => ({
                label: center.center_name,
                value: center.id.toString()
              }))}
              error={form.errors.center_id}
            />


            <TextInput
              label='Name'
              placeholder='Company name'
              required
              mt='md'
              value="sajjad"
              onChange={e => updateValue('name', e.target.value)}
              error={form.errors.name}
            />
          </Group>

          <Group
            justify='flex-end'
            mt='xl'
          >
              <ActionButton loading={form.processing}>Save</ActionButton>
          </Group>
        </form>
      </ContainerBox>
    </>
  );
};

Register.layout = (page) => <Layout title="Dashboard">{page}</Layout>;

export default Register;
