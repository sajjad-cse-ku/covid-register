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
  const [form, submit, updateValue] = useForm('post', route('vaccine.register.store'), {
    name: '',
    center_id:'',
    nid:'',
    email:'',
  });
  return (
    <>
      <ContainerBox>
        <form onSubmit={e => submit(e, { forceFormData: true })}>
          <Group grow>
            <Select
              label='Center Name'
              placeholder='<=== Select country ===>'
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
              label='Full Name'
              placeholder='Enter your full name'
              mt='md'
              value={form.data?.name}
              onChange={e => updateValue('name', e.target?.value)}
              error={form.errors?.name}
            />
          </Group>

          <Group grow>
            <TextInput
              label='NID'
              placeholder='Enter your nid number'
              mt='md'
              value={form.data.nid}
              onChange={e => updateValue('nid', e.target?.value)}
              error={form.errors.nid}
            />
            <TextInput
              label='Email'
              placeholder='Enter your email'
              mt='md'
              value={form.data.email}
              onChange={e => updateValue('email', e.target?.value)}
              error={form.errors.email}
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
