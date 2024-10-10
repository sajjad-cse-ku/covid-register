
import Pagination from "@/components/Pagination";
import SearchInput from "@/components/SearchInput";
import TableHead from "@/components/TableHead";
import TableRowEmpty from "@/components/TableRowEmpty";
import Layout from "@/layouts/MainLayout";
import {  reloadWithQuery } from "@/utils/route";
import { prepareColumns } from "@/utils/table";
import { usePage } from "@inertiajs/react";
import {  Grid, Group, Table } from "@mantine/core";
import TableRow from "./TableRow";

const Index = () => {
  const { items } = usePage().props;
  const columns = prepareColumns([
    { label: "Center Name", column: "center_name" },
    { label: "Daily Limit", column: "daily_limit" },
  ]);

  const rows = items.data.length ? (
    items.data.map((item) => <TableRow item={item} key={item.id} />)
  ) : (
    <TableRowEmpty colSpan={columns.length} />
  );

  const search = (search) => reloadWithQuery({ search });
  const sort = (sort) => reloadWithQuery(sort);

  return (
    <>
      <Grid justify="space-between" align="center">
        <Grid.Col span="content">
          <Group>
            <SearchInput placeholder="Search users" search={search} />
          </Group>
        </Grid.Col>
      </Grid>

      <Table.ScrollContainer miw={800} my="lg">
        <Table verticalSpacing="sm">
          <TableHead columns={columns} sort={sort} />
          <Table.Tbody>{rows}</Table.Tbody>
        </Table>
      </Table.ScrollContainer>

      <Pagination
        current={items.meta.current_page}
        pages={items.meta.last_page}
      />
    </>
  );
};

Index.layout = (page) => <Layout title="Users">{page}</Layout>;

export default Index;
