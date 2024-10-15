import Layout from "@/layouts/MainLayout";
import Card from "@/components/Card";
import ContainerBox from '@/layouts/ContainerBox';
import ActionButton from '@/components/ActionButton';
import {
  TextInput,
  Button,
  Divider,
  Flex,
  Text
} from '@mantine/core';
import axios from 'axios';  // Import axios
import { useState } from 'react';  // Import useState for managing state

const RegisterStatus = () => {
  const [search, setSearch] = useState('');  // State for search input
  const [loading, setLoading] = useState(false);  // State to manage loading state
  const [error, setError] = useState(null);  // State to manage error
  const [status, setStatus] = useState({  });  // State to manage status
  const [show, setShow] = useState(false);  // State to manage status
console.log("asdf",status)
  const handleSearch = async (e) => {
    e.preventDefault();  // Prevent the default form submission

    // Validate search input
    if (!search.trim()) {
      setError('Search field is required');  // Set error if search is empty
      return;  // Exit the function if there's an error
    }

    setLoading(true);  // Set loading to true
    setError(null);  // Reset error

    try {
      const response = await axios.post(route('get.vaccine.register.status'), {
        nid: search,  // Send the search value in the request
      });
      // Handle the response and update status
      setStatus(response.data);  // Assuming your response contains a `status` field
      setShow(true)
    } catch (err) {
      setError(err.response ? err.response.data.message : 'An error occurred');  // Handle the error
    } finally {
      setLoading(false);  // Set loading to false
    }
  };

  return (
    <>
      <ContainerBox>
        <form onSubmit={handleSearch}>  {/* Use handleSearch for form submission */}
          <Flex justify="space-between" align="center" style={{ width: '100%' }}>
            <TextInput
              placeholder="Check your vaccine status using NID"
              value={search}  // Use the search state
              onChange={e => setSearch(e.target.value)}  // Update search state
              error={!!error}  // Show error if any
              style={{ width: '75%' }}  // Set the width of TextInput to 75%
            />
            <ActionButton style={{ width: '20%' }} variant="outline" loading={loading}>  {/* Use loading state */}
              Search
            </ActionButton>
          </Flex>
        </form>
        {error && <Text color="red">{error}</Text>}  {/* Display error message */}
      </ContainerBox>

      <>
        {status && status?.registration_status && show ? ( // Check if status is an object and has registration_status
          <>
            <Divider my={14} mt={25} />
            <Card bg="none">
              <Flex justify="space-between" align="center">
                <Text size="md">Registration Status: {status.registration_status}</Text>
              </Flex>
            </Card>
          </>
        ) : ( // If status is null or doesn't have registration_status
          show && (
            <>
            <Divider my={14} mt={25} />
            <Card bg="none">
              <Flex justify="space-between" align="center">
                <Text size="md">You are not registered at all</Text>
                <Button variant="outline">Outline button</Button>
              </Flex>
            </Card>
            </>
          )
        )}
      </>
    </>
  );
};

RegisterStatus.layout = (page) => <Layout title="Dashboard">{page}</Layout>;

export default RegisterStatus;
